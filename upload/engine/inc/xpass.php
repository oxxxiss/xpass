 <?PHP
/*
=====================================================
 xPass для DLE - by LisER 
-----------------------------------------------------
 http://q-film.ru/
=====================================================
 Данный код защищен авторскими правами
=====================================================
 Файл: xpass.php
-----------------------------------------------------
 Назначение: xPass
=====================================================
*/
if( !defined( 'DATALIFEENGINE' ) OR !defined( 'LOGGED_IN' ) ) {
	die( "Hacking attempt!" );
}

/// *******************************************************************************
		//xPass
/// *******************************************************************************

$xpass = $db->super_query('SELECT pass FROM ' . PREFIX . '_post WHERE id='.id);

  if(!empty($_POST['password']) OR $row['pass'] !==null ){
     $pass = $row['pass'] ;
	  if($_POST['password']==$pass){

	 } else {
   ?>   
   <style>
.blockstop{
  width: 400px;
  background-color: rgba(141, 143, 144, 0.61);
  border: 1px solid white;
  border-radius: 13px;
  height: 160px;
  margin-left: auto;
  margin-right: auto;
 margin-top: 80px;
 }
 .blockstop h1{
  text-align: center;
  color: red;
  text-shadow: 0px 2px 0px white;
 } 
 .blockstop h2{
  font-size: 11px;
  padding: 6px;
  margin-top: 0;
  margin-bottom: 0;
  text-align: center;
 }
 .blockstop form{
  padding-top: 20px;
  padding-left: 60px;
 } 
 .blockstop button{
  width: 52px;
  height: 24px;
  margin-left: 4px;
  border-radius: 2px;
  border: 0;
  background-color: rgb(78, 197, 240);
  color: white;
  text-transform: uppercase;
  font-weight: 600;
 }
 .blockstop button:hover{
background-color: rgb(55, 153, 189);
 }
    </style>   
   <div class="blockstop">
   <h1> STOP </h1>
   <h2>Данный пост защищен!!! Для получения доступа вам необходимо вести пароль</h2>
   <form method="POST">
      <input type="password" name="password" style=" width: 234px;">
   	  <button type="submit">Вход</button>
    </form>
    </div>
	<?php
    }
 }