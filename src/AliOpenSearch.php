<?php
namespace Dachen\Opensearch;

use Illuminate\Config\Repository;
use OpenSearch\Client\OpenSearchClient;
use OpenSearch\Client\SearchClient;
use OpenSearch\Util\SearchParamsBuilder;
class AliOpenSearch{

    protected $config;
    public function __construct(Repository $config)
    {
        $this->config = $config->get('opensearch');
    }



    public function auth()
    {

        $client =  new OpenSearchClient(
            $this->config['accessKeyId'],
            $this->config['secret'],
            $this->config['endPoint'],
            $this->config['options']
        );

        return new SearchClient($client);

    }

    /**
     * 搜索配置项。
     * @return SearchParamsBuilder
     */
    public function SearchParamsBuilder()
    {
        return new SearchParamsBuilder();
    }

}
