<?php
require_once '/OpenServer/domains/first/phpQuery-onefile.php';
class Parser
{

    function getDataCards()
    {

        $url = "https://rus.delfi.lv/";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
        $site = curl_exec($curl);

        $pq = phpQuery::newDocument($site);
        $res = $pq->find('main a');
        foreach ($res as $key => $elem) {


            $resimg = pq($elem)->find('img');
            foreach ($resimg as $key => $elem) {
                $src[] = pq($elem)->attr('src');
            }
        }

        $res = $pq->find('main .text-mine-shaft');
        foreach ($res as $key => $elem) {
            $e[] = pq($elem)->text();
            $href[] = pq($elem)->attr('href');
        }

        //var_dump($href);

        for ($i = 1, $int = 0; $int < 10; $i += 3, $int++) {

            $data[] = $e[$int];
            $data[] = $src[$int];
            $data[] = $href[$int];
        }
        return ($data);
    }


    //.offset-md-1

    //https://rus.delfi.lv/news/daily/abroad/senat-opravdal-trampa-po-delu-ob-impichmente.d?id=52933173

    function getDataArticle($url)
    {

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
        $site = curl_exec($curl);

        $pq = phpQuery::newDocument($site);

        $res = $pq->find('.article-title h1');
        foreach ($res as $key => $elem) {
            $e[] = pq($elem)->text();
        }

        $res = $pq->find('.figure img');
        foreach ($res as $key => $elem) {
            $e[] = pq($elem)->attr('src');
        }

        $res = $pq->find('.col .offset-md-1 p');
        foreach ($res as $key => $elem) {
            $e[] = pq($elem)->text();
        }

        return $e;
    }
}
