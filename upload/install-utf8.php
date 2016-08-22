<?PHP
@error_reporting ( E_ALL ^ E_WARNING ^ E_NOTICE );
@ini_set ( 'display_errors', true );
@ini_set ( 'html_errors', false );
@ini_set ( 'error_reporting', E_ALL ^ E_WARNING ^ E_NOTICE );

define('DATALIFEENGINE', true);
define('ROOT_DIR', dirname (__FILE__));
define('ENGINE_DIR', ROOT_DIR.'/engine');

include ENGINE_DIR.'/classes/mysql.php';
include ENGINE_DIR.'/data/dbconfig.php';
echo "<pre>";

$xpassinc = file_get_contents(ENGINE_DIR."/inc/editnews.php");
if(strpos($xpassinc,"xpass")===false){
	$xpassinc = str_replace("echo \$categoryfilter;","echo \$categoryfilter;\n\tinclude ENGINE_DIR.'/inc/xpass.php';\n\tif(\$_POST['password']==\$pass){\n\t\tsession_start();\n\t\t\$_SESSION['access']=true;\n",$xpassinc);
	$xpassinc = str_replace("HTML;

	echofooter();
}","HTML;

	echofooter();
}}\n",$xpassinc);
	$xpassinc = str_replace("HTML;
			}
		}","HTML;
			}
		}\n\techo <<<HTML\n\t\t<div class=\"form-group\">\n\t\t<label class=\"control-label col-md-2\">Пароль доступа</label>\n\t\t\t<div class=\"col-md-10\">\n\t\t\t\t<input type=\"text\" style=\"width:99%;max-width:145px;\" name=\"passwo\" id=\"passwo\" value=\"{\$row['pass']}\">\n\t\t\t</div>\n\t\t</div>\nHTML;\n",$xpassinc);
	$xpassinc = str_replace("\$title = \$db->safesql( \$title );","if(\$_POST['pass']);else \$passwo = @\$db->safesql( htmlspecialchars( \$_POST['passwo']));\n\t\$title = \$db->safesql( \$title );",$xpassinc);
	$xpassinc = str_replace("title='\$title',","title='\$title', pass='\$passwo',",$xpassinc);
	
	$fp = fopen( ENGINE_DIR . '/inc/editnews.php', 'wb+' );
	fwrite( $fp, $xpassinc );
	fclose( $fp );
	$xpassinc = file_get_contents(ENGINE_DIR."/inc/editnews.php");
	
// ajax

$xpassajax = file_get_contents(ENGINE_DIR."/ajax/editnews.php");
if(strpos($xpassajax,"orderdesc")===false){
	$xpassajax = str_replace("if( \$_REQUEST['action'] == \"edit\" ) {","\$row = \$db->super_query( \"SELECT pass FROM \" . PREFIX . \"_post WHERE id = '\$id'\" );\n\t\$pass = \$row['pass']\n\tif(!empty(\$_POST['password']) OR \$row['pass'] !==null ){\n\tif(\$_POST['password']==\$pass){\n\tsession_start();\n\t\$_SESSION['access']=true;\n\t\nif( \$_REQUEST['action'] == \"edit\" ) {",$xpassajax);
	
	$xpassajax = str_replace("\$buffer = \"ok\";","\$buffer = \"ok\";\n\t}\n\t} else {\n\n\t?>\n\t\t<style>.blockstop{  width: 400px;  background-color: rgba(255, 106, 106, 0.61);  border: 1px solid red;  border-radius: 13px;  height: 125px;  margin-left: auto;  margin-right: auto;  margin-top: 80px; }\n\t.blockstop h1{  text-align: center;  color: red;  font-size: 60px;  text-shadow: 0px 2px 0px white; }\n\t.blockstop h2{  font-size: 12px;  padding: 12px;  margin-top: 0;  margin-bottom: 0;  text-align: center; }\n\t</style>\n\t<div class=\"blockstop\">\n\t<h1> STOP </h1>\n\t<h2>Данный пост защищен!!! Можно редактировать только через админпанель !!  </h2>\n\t</div>\n\t<?php\n\t}\n",$xpassajax);
	
	
	$fp = fopen( ENGINE_DIR . '/ajax/editnews.php', 'wb+' );
	fwrite( $fp, $xpassajax );
	fclose( $fp );
	$xpassajax = file_get_contents(ENGINE_DIR."/ajax/editnews.php");
	
	}

}else
		echo <<<HTML

HTML;

	echo "<body style=\"background-image: -webkit-gradient(linear, 50% 0%, 25% 100%, color-stop(0%, #1DD4FF), color-stop(100%, #1692AE));\">
	<div style=\"width: 300px; background-color: rgba(218, 218, 218, 0.46);margin-left: auto;margin-right: auto;margin-top: 150px;padding: 2px;  height: 170px;  border-radius: 8px;\">
	<div style=\"margin-top: -32px;height: 28px;background-color: rgb(124, 124, 124);color: white;line-height: 30px; padding-left: 10px; margin-left: -2px;margin-right: -2px;border-top-left-radius: 7px;border-top-right-radius: 7px;\">Модуль <b>xPass</b> успешно установлен!</div>
	<div style=\"margin-top: -25px;  margin-left: 6px;\">Внесены изменение в файлах</br>1. /engine/inc/editnews.php</br>2. /engine/ajax/editnews.php</br></br><b style=\"margin-left: 76px;color: red;font-size: 14px;\">Удалите этот файл</b></div><hr>
	<div style=\"margin-top: -32px;margin-left: 5px;\">Автор: LisER</br>Сайт: <a href=\"http://lis-er.ru\">lis-er.ru</a> и <a href=\"http://q-film.ru\">q-film.ru</a></br>ВКонтакте: <a href=\"http://vk.com\osimitj\">osimitj</a></div>
	</div>
	</body>";
echo "";

?>