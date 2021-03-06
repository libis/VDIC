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
        array('name_nl'=>'Sciensano','name_fr'=>'Sciensano','name_de'=>'Sciensano','name_en'=>'Sciensano','link'=>'/items/browse/?tag=sciensano&type=nieuws-'.$lang),
        //array('name_nl'=>'CODA','name_fr'=>'CERVA','name_de'=>'VAF','name_en'=>'VAR','link'=>'/items/browse/?tag=CODA&type=nieuws-'.$lang),
        array('name_nl'=>'HGR','name_fr'=>'CSS','name_de'=>'HGR','name_en'=>'SHC','link'=>'/items/browse/?tag=HGR&type=nieuws-'.$lang),
        array('name_nl'=>'BIOETH','name_fr'=>'BIOETH','name_de'=>'BIOETH','name_en'=>'BIOETH','link'=>'/items/browse/?tag=Bio-ethiek&type=nieuws-'.$lang),
        array('name_nl'=>'FAGG','name_fr'=>'AFMPS','name_de'=>'FAGG-AFMPS','name_en'=>'FADHP','link'=>'/items/browse/?tag=FAGG&type=nieuws-'.$lang),
        array('name_nl'=>'FAVV','name_fr'=>'AFSCA','name_de'=>'FASNK','name_en'=>'FASFC','link'=>'/items/browse/?tag=FAVV&type=nieuws-'.$lang),
        array('name_nl'=>'KCE','name_fr'=>'KCE','name_de'=>'KCE','name_en'=>'KCE','link'=>'/items/browse/?tag=KCE&type=nieuws-'.$lang),
        array('name_nl'=>'NICC','name_fr'=>'INCC','name_de'=>'NICC-INCC','name_en'=>'NICC','link'=>'/items/browse/?tag=NICC&type=nieuws-'.$lang),
        array('name_nl'=>'RIZIV','name_fr'=>'INAMI','name_de'=>'LIKIV','name_en'=>'NIHDI','link'=>'/items/browse/?tag=RIZIV&type=nieuws-'.$lang),
        array('name_nl'=>'AViQ','name_fr'=>'AViQ','name_de'=>'AViQ','name_en'=>'AViQ','link'=>'/items/browse/?tag=AViQ&type=nieuws-'.$lang),
        array('name_nl'=>'Defensie','name_fr'=>'Défense','name_de'=>'Verteidigung','name_en'=>'Defense','link'=>'/items/browse/?tag=defensie&type=nieuws-'.$lang),
        array('name_nl'=>'VAZG','name_fr'=>'VAZG','name_de'=>'VAZG','name_en'=>'VAZG','link'=>'/items/browse/?tag=VAZG&type=nieuws-'.$lang)
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
        $items = get_records('Item',array('type'=> $type ,'tag'=>$partner['name_nl'],'sort_field'=>'added','sort_dir'=>'d'),$number);

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
        array('name_nl'=>'Sciensano','name_fr'=>'Sciensano','name_de'=>'Sciensano','name_en'=>'Sciensano','link'=>'/contact/?partner=Sciensano'),
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

function libis_language_nav(){
    $html = '<ul id="blgm_languageSwitch">';
    $active = array('nl'=>'','fr'=>'','de'=>'','en'=>'');
    $langs = array('nl/','fr/','de/','en/');
    $date="";
    $links=array();

    if(isset($_SESSION['lang'])){
        $lang = $_SESSION['lang'];
        $active[$lang]="blgm_active";
    }else{
        $lang ='nl';
        $active['nl']="blgm_active";
    }

    //get current url
    $item = get_current_record('item', false);

    if($item):
        $date = metadata($item,array('Dublin Core','Identifier'));
    endif;

    if($date):
        $links = libis_get_other_lang_new($date);

    elseif(get_current_record('simple_pages_page', false)):
        $slug = metadata('simple_pages_page', 'slug');
        $temp = substr($slug, 0, 3);

        if(in_array($temp,$langs)):
            $links['nl']= str_replace($temp, 'nl/', $slug);
            $links['fr']= str_replace($temp, 'fr/', $slug);
            $links['de']= str_replace($temp, 'de/', $slug);
            $links['en']= str_replace($temp, 'en/', $slug);
        endif;
    elseif(strpos($_SERVER['REQUEST_URI'], 'contact') !== false):
        $links['nl']= 'contact/?lang=nl';
        $links['fr']= 'contact/?lang=fr';
        $links['de']= 'contact/?lang=de';
        $links['en']= 'contact/?lang=en';
    else:
        $links['nl']= '/?lang=nl';
        $links['fr']= '/?lang=fr';
        $links['de']= '/?lang=de';
        $links['en']= '/?lang=en';
    endif;

    $html .= '<li class="blgm_first '.$active['nl'].'">';
    $html .= '<a href="'.url($links['nl']).'" lang="nl" class="blgm_lSwitch" title="Nederlands">nl</a>';
    $html .= '</li><li class="'.$active['fr'].'">';
    $html .= '<a href="'.url($links['fr']).'" lang="fr" class="blgm_lSwitch" title="Francais">fr</a>';
    $html .= '</li><li class="'.$active['de'].'">';
    $html .= '<a href="'.url($links['de']).'" lang="de" class="blgm_lSwitch" title="Deutsch">de</a>';
    $html .= '</li><li class="blgm_last '.$active['en'].'">';
    $html .= '<a href="'.url($links['en']).'" lang="en" class="blgm_lSwitch" title="English">en</a>';
    $html .= '</li></ul>';

    return $html;

}

function libis_get_other_lang_new($date){
    $links['nl']= '/?lang=nl';
    $links['fr']= '/?lang=fr';
    $links['de']= '/?lang=de';
    $links['en']= '/?lang=en';
    //find all element text with this date
    $db = get_db();

    $select = $db->getTable('ElementText')->getSelect();
    $select->where('element_texts.text = ?', $date);
    $texts = $db->getTable('ElementText')->fetchObjects($select);

    //get items from the record_ids
    foreach($texts as $text):
        $item = get_record_by_id('item', $text->record_id);
        if(!$item):
            return $links;
        endif;
        switch($item->getItemType()->name):
            case 'nieuws-nl':
                $links['nl']='/items/show/'.$item->id;
                break;
            case 'nieuws-fr':
                $links['fr']='/items/show/'.$item->id;
                break;
            case 'nieuws-de':
                $links['de']='/items/show/'.$item->id;
                break;
            case 'nieuws-en':
                $links['en']='/items/show/'.$item->id;
                break;
        endswitch;
    endforeach;

    return $links;
}
?>
