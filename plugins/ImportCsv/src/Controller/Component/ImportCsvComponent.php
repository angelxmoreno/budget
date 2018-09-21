<?php

namespace ImportCsv\Controller\Component;

use Cake\Controller\Component;
use Cake\Core\Exception\Exception;
use Cake\Http\ServerRequest;
use League\Csv\Reader;
use League\Csv\ResultSet;
use League\Csv\Statement;
use Psr\Http\Message\UploadedFileInterface;
use Zend\Diactoros\UploadedFile;

/**
 * ImportCsv component
 */
class ImportCsvComponent extends Component
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [
        'file_types' => ['text/plain', 'text/csv'],
        'move_dir' => CACHE
    ];

    /**
     * @param ServerRequest $request
     * @param string $csv_file
     * @return string
     * @throws \League\Csv\Exception
     */
    public function processPost(ServerRequest $request, string $csv_file = 'csv_file') : string
    {
        $file = $request->getUploadedFile($csv_file);

        return $this->validateFile($file);
    }

    /**
     * @param string $target_file
     * @return Reader
     * @throws \League\Csv\Exception
     */
    public function getCsv(string $target_file) : Reader
    {
        $csv = Reader::createFromPath($this->getTargetPath() . $target_file, 'r');
        $csv->setHeaderOffset(0);

        return $csv;
    }

    /**
     * @param string $target_file
     * @return ResultSet
     * @throws \League\Csv\Exception
     */
    public function getRecords(string $target_file) : ResultSet
    {
        $csv = $this->getCsv($target_file);

        return (new Statement)->process($csv);
    }

    /**
     * @param UploadedFileInterface $file
     * @return string
     * @throws \League\Csv\Exception
     */
    protected function validateFile(UploadedFileInterface $file) : string
    {
        $file_type = $file->getClientMediaType();
        $error = $file->getError();
        $target_file = $this->getTargetFile($file);

        if ($error !== UPLOAD_ERR_OK) {
            throw new Exception(UploadedFile::ERROR_MESSAGES[$error]);
        }

        if (!in_array($file_type, $this->getConfig('file_types'))) {
            throw new Exception(sprintf(
                "%s is not a valid file type. Please use %s",
                $file_type,
                implode(', ', $this->getConfig('file_types'))
            ));
        }

        if (!is_dir($this->getTargetPath())) {
            mkdir($this->getTargetPath(), 0777, true);
        }

        $file->moveTo($this->getTargetPath() . $target_file);

        $this->getCsv($target_file);

        return $target_file;
    }

    public function getTargetPath() : string
    {
        return $this->getConfig('move_dir') . $this->getController()->Auth->user('id') . DS;
    }

    protected function getTargetFile(UploadedFileInterface $file) : string
    {
        return md5(time() . $file->getClientFilename());
    }
}
