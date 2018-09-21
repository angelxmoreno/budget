<?php

namespace Axm\Budget\View\Helper;

use Axm\Budget\Model\Entity\Location;
use Axm\Budget\Model\Entity\Project;
use Axm\Budget\Model\Entity\Talent;
use BootstrapUI\View\Helper\HtmlHelper;

/**
 * AppHtml helper
 */
class AppHtmlHelper extends HtmlHelper
{
    public function activeLiLink($title, $url = null, array $options = [])
    {
        $link = $this->link($title, $url, $options);
        $li_options = [];
        $target = $this->Url->build($url, $options);
        $current = $this->request->getAttribute('here');
        if ((strpos($current, $target) === 0 && $target !== '/') ||
            ($current === $target && $target === '/')
        ) {
            $li_options['class'] = 'active';
        }

        return $this->tag('li', $link, $li_options);
    }
}
