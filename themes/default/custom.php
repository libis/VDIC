<?php
/** 
 * @param type $number
 * @return string
 */
function Libis_get_nieuws($number){
        $lang = libis_get_language();    
        $items = get_records('Item',array('type'=>'nieuws-'.$lang,'sort_field'=>'added','sort_dir'=>'d'),$number);	   
	
        $html =""; 
        if(sizeof($items)>0){                      
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
                    $html .= metadata('Item',array('Dublin Core','Description'),array('snippet'=>'200'));
                    $html .= " [<a href=''>".link_to_item(__("lees meer"))."</a>]";
                }   
                $html .="</div>";                               
            endforeach;
            return $html;
        }else{
            return __("Er zijn geen nieuwsberichten.");
        }
}

/**
 * 
 * @param type $number
 * @return string
 */
function Libis_get_nieuws_partners($number){
    $lang = libis_get_language();
    $partners = array(
        array('name_nl'=>'FOD VVVL','name_fr'=>'SPF SPSCAE','name_de'=>'FÖD VSNU','name_en'=>'FPS HSFCE','link'=>'/items/browse/?tag=fod vvvl&type=nieuws-'.$lang),
        array('name_nl'=>'WIV','name_fr'=>'ISP','name_de'=>'WIV','name_en'=>'IPH','link'=>'/items/browse/?tag=WIV&type=nieuws-'.$lang),
        array('name_nl'=>'CODA','name_fr'=>'CERVA','name_de'=>'VAF','name_en'=>'VAR','link'=>'/items/browse/?tag=CODA&type=nieuws-'.$lang),
        array('name_nl'=>'HGR','name_fr'=>'CSS','name_de'=>'HGR','name_en'=>'SHC','link'=>'/items/browse/?tag=HGR&type=nieuws-'.$lang),
        array('name_nl'=>'BIOETH','name_fr'=>'BIOETH','name_de'=>'BIOETH','name_en'=>'BIOETH','link'=>'/items/browse/?tag=Bio-ethiek&type=nieuws-'.$lang),
        array('name_nl'=>'FAGG','name_fr'=>'AFMPS','name_de'=>'FAGG-AFMPS','name_en'=>'FADHP','link'=>'/items/browse/?tag=FAGG&type=nieuws-'.$lang),
        array('name_nl'=>'FAVV','name_fr'=>'AFSCA','name_de'=>'FASNK','name_en'=>'FASFC','link'=>'/items/browse/?tag=FAVV&type=nieuws-'.$lang),
        array('name_nl'=>'KCE','name_fr'=>'KCE','name_de'=>'KCE','name_en'=>'KCE','link'=>'/items/browse/?tag=KCE&type=nieuws-'.$lang),
        array('name_nl'=>'NICC','name_fr'=>'INCC','name_de'=>'NICC-INCC','name_en'=>'NICC','link'=>'/items/browse/?tag=NICC&type=nieuws-'.$lang)
    );
   
    $html = "<ul>";
    foreach($partners as $partner){
        $html .= "<li><a class='page active' href='".url($partner['link'])."'>".$partner['name_'.$lang]."</a>";
        
       if($lang == 'nl') {
            $type = '8';
        } elseif($lang == 'fr') {
            $type = '19';
        } elseif($lang == 'de') {
            $type = '22';
        } elseif($lang == 'en') {
            $type = '25';
        } else {
            // if everything fails, we default to dutch
            $type = '8';
        }
        $items = get_records('Item',array('type'=> $type ,'tag'=>$partner['name_nl']),$number);
       
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
    $lang = libis_get_language();
    $partners = array(        
        array('name_nl'=>'FOD VVVL','name_fr'=>'SPF SPSCAE','name_de'=>'FÖD VSNU','name_en'=>'FPS HSFCE','link'=>'/contact/?partner=VES'),
        array('name_nl'=>'WIV','name_fr'=>'ISP','name_de'=>'WIV','name_en'=>'IPH','link'=>'/contact/?partner=WIV'),
        array('name_nl'=>'CODA','name_fr'=>'CERVA','name_de'=>'VAF','name_en'=>'VAR','link'=>'/contact/?partner=CODA'),
        array('name_nl'=>'HGR','name_fr'=>'CSS','name_de'=>'HGR','name_en'=>'SHC','link'=>'/contact/?partner=HGR'),
        array('name_nl'=>'BIOETH','name_fr'=>'BIOETH','name_de'=>'BIOETH','name_en'=>'BIOETH','link'=>'/contact/?partner=BIOET'),        
        array('name_nl'=>'FAGG','name_fr'=>'AFMPS','name_de'=>'FAGG-AFMPS','name_en'=>'FADHP','link'=>'/contact/?partner=FAGG'),
        array('name_nl'=>'FAVV','name_fr'=>'AFSCA','name_de'=>'FASNK','name_en'=>'FASFC','link'=>'/contact/?partner=FAVV'),
        array('name_nl'=>'KCE','name_fr'=>'KCE','name_de'=>'KCE','name_en'=>'KCE','link'=>'/contact/?partner=KCE'),
        array('name_nl'=>'NICC','name_fr'=>'INCC','name_de'=>'NICC-INCC','name_en'=>'NICC','link'=>'/contact/?partner=NICC')
    );
    $html = "<ul>";
    foreach($partners as $partner){
        $html .= "<li><a class='page active' href='".$partner['link']."'>".$partner['name_'.$lang]."</a></li>";
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

function libis_get_language_slug(){
    if(!isset($_SESSION['lang']) || $_SESSION['lang']=='nl'){
        return "nl/";
    }else{
        return $_SESSION['lang']."/";
    }   
}


function libis_get_language(){
    if(!isset($_SESSION['lang']) || $_SESSION['lang']=='nl'){
        return "nl";
    }else{
        return $_SESSION['lang'];
    }   
}
?>