<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" href="js/Leaflet-0.7.7/leaflet.css" />
        <script src='https://api.mapbox.com/mapbox.js/v2.4.0/mapbox.js'></script>
        
       

<link href='https://api.mapbox.com/mapbox.js/plugins/leaflet-fullscreen/v1.0.1/leaflet.fullscreen.css' rel='stylesheet' />

        
    </head>
 
    <body onload="initialize()">

        <div id="ajout_pins" class="pop_up_inv hide"><div  class="pop_up">
               <form>
                <div id="selecteur"><a class="btn" id="btn_text">Texte</a><a class="btn" id="btn_circle">Cercle</a><a class="btn" id="btn_polygone">Polygone</a><a class="btn" id="btn_polyline">Lignes</a></div>
                <div id="form_text" class="formulaire hide">
                    <h2>Ecrire sur la carte</h2>
                    <input id="label_text" placeholder="Votre texte"><br><br>
                    
                    
                    <a href="#" class="ajouter"  id="drawText">Ajouter texte</a>
                    
                </div>
                <div id="form_circle" class="formulaire hide">
                    <h2>Créer un cercle</h2>

                    <p class="align">Taille du cercle</p>
                    <select class="align" id="taille_circle" name="taille_cercle">
                      <option value="50000">Petit</option>
                      <option value="100000">Moyen</option>
                      <option value="200000">Grand</option>
                    </select><br>
                    <p class="align">Couleur du cercle</p>
                    <select class="align" id="color_circle" name="color_circle">
                      <option value="blue">bleu</option>
                      <option value="red">rouge</option>
                      <option value="green">vert</option>
                      <option value="gray">gris</option>
                    </select><br>
                    
                    <a href="#" class="ajouter"  id="drawCircle">Ajouter Cercle</a>
                    
                </div>
                <div id="form_polygone" class="formulaire hide">
                    <h2>Créer une forme</h2>
                    <p class="align">Couleur de la forme</p>
                    <select class="align" id="color_polygone" name="color_polygone">
                      <option value="blue">bleu</option>
                      <option value="red">rouge</option>
                      <option value="green">vert</option>
                      <option value="gray">gris</option>
                    </select><br>
                    <a href="#"  class="ajouter" id="drawPolygon">Ajouter Polygone</a>
                    
                </div>
                <div id="form_polyline" class="formulaire hide">
                    <h2>Créer une ligne</h2>
                    <p>Couleur de la ligne</p>
                    <select class="align" id="color_polyline" name="color_polyline">
                      <option value="blue">bleu</option>
                      <option value="red">rouge</option>
                      <option value="green">vert</option>
                      <option value="gray">gris</option>
                    </select><br>
                     <a href="#" class="ajouter"  id="drawPolyline">Ajouter Polyline</a>
                    
                </div>
                
                
               

               </form>
        </div></div>
        <div id="ajout_bateau" class="pop_up_inv hide"><div  class="pop_up">
               <div class="formulaire_bat">
                <h3>DEPLACEMENT</h3><br>
                <label>Type de vehicule</label><br>
                <select class="align" id="type_bateau" name="type_bateau">
                      <option value="porte-avion">porte-avion</option>
                      <option value="cuirasse">cuirasse</option>
                      <option value="destroyer">destroyer</option>
                      <option value="helico">helico</option>
                      <option value="avion">avion</option>
                </select><br>
                <label>Vitesse du trajet</label><br>
                <select class="align" id="vitesse_bateau" name="vitesse_bateau">
                      <option value="1.8">lente</option>
                      <option value="1">moyenne</option>
                      <option value="0.5">rapide</option>
                </select><br>
                <label>Alignement</label><br>
                <select class="align" id="color_bateau" name="color_bateau">
                      <option value="blue">Allié</option>
                      <option value="green">Neutre</option>
                      <option value="red">Ennemi</option>
                </select><br>
                <label>Description (facutatif)</label><br>
                <textarea id="description" name="description"></textarea>
                <a href="#" class="ajouter" id="drawTrajet">Ajouter Trajet</a>
                
               </div>
        </div></div>
        <div class="big_btn">
                    <div id="timer">
 
 <span id="days">00J:</span> 
  <span id="hours">00H:</span>
  <span id="mins">00M</span>  
  </div>
<div id="controls">
  <button id="play">Start</button>
<button id="pause">Stop</button>
<select id="speed">
  <option value="1">1</option>
  <option value="2">3</option>
  <option value="5">5</option>
  <option value="10">10</option>
  <option value="50">50</option>
  <option value="100">100</option>
  <option value="10000">10000</option>
  
  
</select>


</div>
<!--
          <a href="#" id="play" class="btn">LANCER</a></br></br></br>
          <a href="#" id="pause" class="btn">PAUSE</a>
-->
        </div>
        <div id="boussole"><img style="height:100%;width:100%" src="image/boussole.png"></div>
        <div id="map">


            
        </div>
        <div id="toolbar">
            <div class="forme" id="bateau"> <img src="image/bateau.png"></div>
            <div class="forme" id="forme"> <img src="image/forme.png"></div>
        </div>


     <!--   <div class="settings">
            <h1 id="ll">Paramètres</h1>
            <p class="align">Cacher les profondeurs</p>
            <div class="align" id="profondeur"><input type="checkbox"></div><br>
             <p class="align">Cacher les côtes et les rivières</p>
            <div class="align" id="riv"><input type="checkbox"></div><br>
                     <p class="align">Cacher les structures</p>
            <div class="align" id="structures"><input type="checkbox"></div><br>
            <button class="hide btn_finish" id="stopDraw">Arrêter de dessiner</button>
            <button class="hide btn_finish" id="stopDrawPolyline">Arrêter de dessiner</button>
            <button class="hide btn_finish" id="stopDrawTrajet">Arrêter de dessiner</button>
            <button class="hide btn_finish" id="stopEditPolyline">Arrêter de dessiner</button>
            <input class="hide" id="editVitesse" placeholder="Votre Vitesse"><br>

            <div class="delete">
              <div class="delete_polyline">
                <h2>Supprimer les lignes</h2>
                <p class="delete_polyline_p"></p>
              </div>
              <div class="delete_cercle">
                <h2>Supprimer les cercles</h2>
                <p class="delete_cercle_p"></p>
              </div>
              <div class="delete_texte">
                <h2>Supprimer les textes</h2>
                <p class="delete_texte_p"></p>
              </div>
              <div class="delete_polygone">
                <h2>Supprimer les polygones</h2>
                <p class="delete_polygone_p"></p>
              </div>
            </div>

          </div> -->


        <button id="sidebar-btn" class="sidebar-btn">
            <div class="menu-stripes1"></div>
            <div class="menu-stripes"></div>
            <div class="menu-stripes2"></div>
        </button>
        <section id="sidebar" class="sidebar">
            <div class="settings">
                <h1>Parametres</h1>

                <p class="align">Cacher les profondeurs</p>
                <div class="align" id="profondeur"><input type="checkbox"></div><br>
                <p class="align">Cacher les côtes et les rivières</p>
                <div class="align" id="riv"><input type="checkbox"></div><br>
                <p class="align">Cacher les structures</p>
                <div class="align" id="structures"><input type="checkbox"></div><br>
                <button class="hide btn_finish" id="stopDraw">Arrêter de dessiner</button>
                <button class="hide btn_finish" id="stopDrawPolyline">Arrêter de dessiner</button>
                <button class="hide btn_finish" id="stopDrawTrajet">Arrêter de dessiner</button>
                <button class="hide btn_finish" id="stopEditPolyline">Arrêter de dessiner</button>
                <input class="hide" id="editVitesse" placeholder="Votre Vitesse"><br>

                <div class="delete">
                    <div class="delete_polyline">
                        <h2>Supprimer les lignes</h2>
                        <p class="delete_polyline_p"></p>
                    </div>
                    <div class="delete_cercle">
                        <h2>Supprimer les cercles</h2>
                        <p class="delete_cercle_p"></p>
                    </div>
                    <div class="delete_texte">
                        <h2>Supprimer les textes</h2>
                        <p class="delete_texte_p"></p>
                    </div>
                    <div class="delete_polygone">
                        <h2>Supprimer les polygones</h2>
                        <p class="delete_polygone_p"></p>
                    </div>
                </div>


            </div>

        </section>

        <script type="text/javascript" src="js/function.js"></script>
        <script type="text/javascript" src="js/icone.js"></script>
        <script type="text/javascript" src="js/map.js"></script>
        <script src="js/Leaflet-0.7.7/leaflet.js"></script> 
        <script src="js/MovingMarker.js"></script>
                   
        <script src='https://api.mapbox.com/mapbox.js/plugins/leaflet-fullscreen/v1.0.1/Leaflet.fullscreen.min.js'></script>
<link href='https://api.mapbox.com/mapbox.js/plugins/leaflet-fullscreen/v1.0.1/leaflet.fullscreen.css' rel='stylesheet' />
      
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>


        <script>







            var sidebar = (function() {
                "use strict";

                var $contnet         = $('#content'),
                        $sidebar         = $('#sidebar'),
                        $sidebarBtn      = $('#sidebar-btn'),
                        $toggleCol       = $('body').add($contnet).add($sidebarBtn),
                        sidebarIsVisible = false;

                $sidebarBtn.on('click', function() {

                    if (!sidebarIsVisible) {
                        bindContent();
                    } else {
                        unbindContent();
                    }

                    toggleMenu();
                });


                function bindContent() {

                    $contnet.on('click', function() {
                        toggleMenu();
                        unbindContent();
                    });
                }

                function unbindContent() {
                    $contnet.unbind();
                }

                function toggleMenu() {

                    $toggleCol.toggleClass('sidebar-show');
                    $sidebar.toggleClass('show');

                    if (!sidebarIsVisible) {
                        sidebarIsVisible = true;
                    } else {
                        sidebarIsVisible = false;
                    }
                }


                var $menuToggle = $sidebar.find('.menu-toggle');

                $menuToggle.each(function() {

                    var $this       = $(this),
                            $submenuBtn = $this.children('.menu-toggle-btns').find('.menu-btn'),
                            $submenu    = $this.children('.submenu');

                    $submenuBtn.on('click', function(e) {
                        e.preventDefault();
                        $submenu.slideToggle();
                        $(this).toggleClass('active');
                    });
                });

            })();


        </script>


    </body>
</html>
