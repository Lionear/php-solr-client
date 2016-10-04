<?php


namespace MinhD\SolrClient;


trait SolrClientSearchTrait
{
    private $searchParams = [
        'start' => 0,
        'rows' => 10
    ];

    private $result = null;

    /**
     * @param string $query
     * @return mixed
     */
    public function query($query)
    {
        return $this->search(
            array_merge($this->getSearchParams(), ['q' => $query])
        );
    }

    /**
     * @param mixed $parameters
     * @return mixed
     */
    public function search($parameters)
    {
        $this->result = null;
        $result = $this->request('GET', $this->getCore().'/select', $parameters);
        $this->result = new SolrSearchResult($result, $this);
        return $this->result;
    }

    public function getNumFound()
    {
        return $this->result['response']['numFound'];
    }

    public function getDocs()
    {
        return $this->result['response']['docs'];
    }

    /**
     * @return array
     */
    public function getSearchParams()
    {
        return $this->searchParams;
    }

    /**
     * @param string $name
     * @param string $value
     * @return $this
     */
    public function setSearchParams($name, $value)
    {
        $this->searchParams[$name] = $value;
        return $this;
    }

    /**
     * @return null
     */
    public function getResult()
    {
        return $this->result;
    }

}