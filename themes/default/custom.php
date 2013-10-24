<?php
/**
 * 
 * @param type $number
 * @return string
 */
function Libis_get_nieuws($number){
	$items = get_records('Item',array('type'=> '8','tag'=>'algemeen'),$number);
	//get current date
	//$now= strtotime(date('Y-m-d'));
      
        if(sizeof($items)>0){
            $html ="";
            set_loop_records('items', $items);
            foreach(loop('items') as $item):                
                $html .="<div class='newsitem'>";
                if(metadata('Item',array('Dublin Core','Title'))){
                    
                    if(metadata('Item',array('Dublin Core','Date'))){
                        $html .= "<span class='date'>".metadata('Item',array('Dublin Core','Date'))."</span>";
                    }                   
                    $html .= "<h2 class='heading'><span>".link_to_item(metadata('Item',array('Dublin Core','Title')))."</span></h2>";
                                    
                }  
                if(metadata('Item',array('Dublin Core','Description'))){
                    $html .= metadata('Item',array('Dublin Core','Description'));
                }   
                $html .="</div>";               
               
            endforeach;
            return $html;
        }else{
            return __("There are no current news items.");
        }	
}

/**
 * 
 * @param type $number
 * @return string
 */
function Libis_get_nieuws_partners($number){
    $partners = array(
        array('name'=>'WIV','link'=>'/items/browse/?tag=WIV'),
        array('name'=>'CODA','link'=>'/items/browse/?tag=CODA'),
        array('name'=>'HGR','link'=>'/items/browse/?tag=HGR'),
        array('name'=>'FAGG','link'=>'/items/browse/?tag=FAGG'),
        array('name'=>'VESALIUS Eurostation','link'=>'/items/browse/?tag=Vesalius'),
        array('name'=>'Raadgevend Comité voor Bio-ethiek','link'=>'/items/browse/?tag=Bio-ethiek'),
        array('name'=>'FAVV','link'=>'/items/browse/?tag=FAVV'),
        array('name'=>'KCE','link'=>'/items/browse/?tag=KCE'),
        array('name'=>'NICC','link'=>'/items/browse/?tag=NICC')
    );
    $html = "<ul>";
    foreach($partners as $partner){
        $html .= "<li><a class='page active' href='".$partner['link']."'>".$partner['name']."</a>";
        
        $items = get_records('Item',array('type'=> '8','tag'=>$partner['name']),$number);
       
        if(sizeof($items)>0){            
            set_loop_records('items', $items);
            foreach(loop('items') as $item):                
                $html .="<ul>";
                if(metadata('Item',array('Dublin Core','Title'))){
                    $html .= "<li>".link_to_item(metadata('Item',array('Dublin Core','Title')),array('class'=>'page'))."</li>";
                }
                $html .="</ul>";
            endforeach;
            
        }
        $html .= "</li>";
    }
    $html .="</ul>";
    return $html;
}

/**
 * 
 * @param type $number
 * @return string
 */
function Libis_contact_partners(){
    $partners = array(
        array('name'=>'WIV','link'=>'/contact/?partner=WIV'),
        array('name'=>'CODA','link'=>'/contact/?partner=CODA'),
        array('name'=>'HGR','link'=>'/contact/?partner=HGR'),
        array('name'=>'FAGG','link'=>'/contact/?partner=FAGG'),
        array('name'=>'VESALIUS Eurostation','link'=>'/contact/?partner=VES'),
        array('name'=>'Raadgevend Comité voor Bio-ethiek','link'=>'/contact/?partner=BIOET'),
        array('name'=>'FAVV','link'=>'/contact/?partner=FAVV'),
        array('name'=>'KCE','link'=>'/contact/?partner=KCE'),
        array('name'=>'NICC','link'=>'/contact/?partner=NICC')
    );
    $html = "<ul>";
    foreach($partners as $partner){
        $html .= "<li><a class='page active' href='".$partner['link']."'>".$partner['name']."</a></li>";
    }
    $html .="</ul>";
    return $html;
}

function Libis_partner_info($partner){
    $link = "http://opac.libis.be/cgi-bin/library_info.pl?library="
        .$partner."&day=04&month=09&year=2013&language=ENG&output=json";
    
    $vo_http_client = new Zend_Http_Client();
    if($_SERVER['REMOTE_ADDR']!="127.0.0.1"){
        $config = array(
                        'adapter'    => 'Zend_Http_Client_Adapter_Proxy',
                        'proxy_host' => 'icts-http-gw.cc.kuleuven.be',
                        'proxy_port' => 8080
        );
        $vo_http_client->setConfig($config);
    }
    $vo_http_client->setUri($link);

    $vo_http_response = $vo_http_client->request();
    $json = $vo_http_response->getBody();
    $json = str_replace('bibinfo(', '', $json);
    $json = str_replace(');', '', $json);
    
    
    $json = str_replace(array("\r\n", "\n", "\r","<br>"),'',$json);
    //echo str_replace(array('\r\n', '\r', '\n', '\t'), array('\\r\\n', '\\r', '\\n', '\\t'), $json);
    $json = preg_replace("/([0-9]+)(:)/",'"${1}"${2}',$json);
    
    $info = json_decode($json, true);
       
    $html = "<h4>".$info['sub_library_name']."</h4>";
    $html .="<table class='bib-info'>";
    $html .= "<tr><td>".__("Adres: ")."</td><td>".$info['Address']."</td></tr>";
    $html .= "<tr><td>".__("Tel: ")."</td><td>".$info['tel'][0]."</td></tr>";
    $html .= "<tr><td>".__("Fax: ")."</td><td>".$info['fax'][0]."</td></tr>";
    $html .= "<tr><td>".__("E-mail: ")."</td><td>".$info['mail'][0]."</td></tr>";
    $html .="</table>";
    
    $return = array('html'=>$html,'email'=>$info['mail'][0]);
    
    return $return;
}

function Libis_language_widget(){
    if(!$_SESSION['lang'] || $_SESSION['lang']=='nl'){
        $html = "<li><a href='".url("/?lang=en")."'>EN</a></li>";
        $html .= "<li>NL</li>";
        return $html;
    }
     if($_SESSION['lang']=='en'){
        $html = "EN";
        $html .= " | <a href='".uri("/?lang=nl")."'>NL</a><br>";
        return $html;
    }   
    ?>
        <li class="blgm_first blgm_active">
            <span lang="nl" class="blgm_lSwitch" title="Nederlands">nl</span>
        </li>
        <li >
            <a href="#" lang="fr" class="blgm_lSwitch" title="Francais">fr</a>
        </li>
        <li >
            <a href="#" lang="de" class="blgm_lSwitch" title="Deutsch">de</a>
        </li>
        <li class="blgm_last ">
            <a href="#" lang="en" class="blgm_lSwitch" title="English">en</a>
        </li>
    <?php
}
?>

