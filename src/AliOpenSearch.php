<?php
namespace Dachen\Opensearch;
//require_once __DIR__ . '/OpenSearch/Autoloader/Autoloader.php';

use Illuminate\Config\Repository;
use Illuminate\Support\Arr;
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


    public function getSearchId($query,$start = 0,$hits = 20,$filter='',$sort = [])
    {

        $searchClient = $this->auth();
        $param = [
            'appName'   => $this->config['appName'],
            'start'     => $start,
            'hits'      => $hits,
            'query'     => "default:'{$query}'",
            'filter'    => $filter,
            'sort'      => $sort,
            'format'    => 'json'
//            'sort'      => ['field'=>'', 'order'=>1]
        ];

        $params = new SearchParamsBuilder($param);

        $ret = $searchClient->execute($params->build())->result;

        if(!$ret)
        {
            return [];
        }

        $result = json_decode($ret,true);
        if(empty($result['result']['items']))
        {
            return [];
        }

        return Arr::pluck($result['result']['items'],'id');

    }



}
