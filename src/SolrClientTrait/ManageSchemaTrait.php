<?php


namespace Lionear\SolrClient\SolrClientTrait;

use Lionear\SolrClient\Admin\SchemaManager;

trait ManageSchemaTrait
{
    public function schema()
    {
        return new SchemaManager($this);
    }
}
