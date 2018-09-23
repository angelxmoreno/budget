<?php

namespace Axm\Budget\Model\Table;

use Auth\Model\Entity\Auth;
use Cake\Cache\Cache;
use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\Utility\Hash;

/**
 * Class TableBase
 * @package Axm\Budget\Model\Table
 *
 * @method Auth getAuthUser()
 */
abstract class TableBase extends Table
{
    public function initialize(array $config)
    {
        parent::initialize($config);
        $this->addBehavior('Timestamp');
        $this->addBehavior('Auth.Auth');
    }

    /**
     * @param Query $query
     * @return string
     * @deprecated use findLastModifiedDate()->format('D, d M Y H:i:s T');
     */
    public function findLastModified(Query $query)
    {
        return $this->findLastModifiedDate($query)->format('D, d M Y H:i:s T');
    }

    public function findLastModifiedDate(Query $query)
    {
        $field = $this->getAlias() . '.modified';
        $result = $query
            ->select($field)
            ->orderDesc($field)
            ->first()
            ->get('modified');

        return $result;
    }

    /**
     * @return mixed
     * @deprecated use Query::cache()
     */
    public function getLastModified()
    {
        return Cache::remember('lastModified:' . $this->getAlias(), function () {
            return $this->find('lastModified');
        }, '_cake_model_');
    }

    public function findRandom(Query $query)
    {
        return $query->order(['RAND()']);
    }

    public function findOwnedByUser(Query $query, $options)
    {
        $user_id = Hash::get($options, 'user_id');

        $query->where([
            $this->getAlias() . '.user_id' => $user_id
        ]);

        return $query;
    }
}
