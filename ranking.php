<!doctype html>
<html><!-- InstanceBegin template="/Templates/pagina normal.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta charset="utf-8">
<!-- InstanceBeginEditable name="doctitle" -->
<title>Documento sin título</title>
<style type="text/css">
</style>
<!-- InstanceEndEditable -->
<link href="CSS/estilos.css" rel="stylesheet" type="text/css">
<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<script type="text/javascript">
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
</script>
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
</head>

<body onLoad="MM_preloadImages('Imagenes/flashimagenes/header5.jpg','Imagenes/flashimagenes/header6.jpg','Imagenes/flashimagenes/header7.jpg','Imagenes/flashimagenes/header8.jpg')">

<div class="container">
  <header>
      
  <a href="#" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image1','','Imagenes/flashimagenes/header8.jpg',1)"><img src="Imagenes/flashimagenes/header1.jpg" alt="imagen1" width="180" height="120" id="Image1"></a><a href="#" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('imagen2','','Imagenes/flashimagenes/header7.jpg',1)"><img src="Imagenes/flashimagenes/header2.jpg" alt="imagen2" width="180" height="120" id="imagen2"></a><a href="#" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image4','','Imagenes/flashimagenes/header5.jpg',1)"><img src="Imagenes/flashimagenes/header4.jpg" alt="imagen4" width="180" height="120" id="Image4"></a><a href="#" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image3','','Imagenes/flashimagenes/header6.jpg',1)"><img src="Imagenes/flashimagenes/header3.jpg" alt="imagen3" width="180" height="120" id="Image3"></a>
    <div class="rotulo"><img src="Imagenes/logo.jpg" width="235" height="120"  alt=""/></div>
 	
  </header>
  
  <article class="content">
    <div class="sombre"><img src="Imagenes/sombra.jpg" width="955" height="20"  alt=""/></div>
    <div class="titulo"><img src="Imagenes/front.jpg" width="540" height="282"  alt=""/></div>
    
    <div class="barraLateral">
      <div class="barraLateraltop"></div>
      <div class="barraLateralMed"><!-- InstanceBeginEditable name="contenidoLateral" -->
        <div class="contenidoLateral" id="contenidoLateral">
          <p class="rotuloLateral">RANKING</p>
        </div>
      <!-- InstanceEndEditable -->
        <ul>
          <li><a href="index.php">Noticias</a></li>
          <li><a href="ranking.php">Ranking</a></li>
          <li><a href="calendario.php">Calandario</a></li>
        </ul>
      </div>
      <div class="barraLateralBot"></div>
    </div>
    <!-- InstanceBeginEditable name="Contenidos" -->
    <div class="cotenidos">
    </div>
    <!-- InstanceEndEditable --><!-- end .content --></article>
  <footer>
    <p>pie de pagina</p>

  </footer>
<!-- end .container --></div>
</body>
<!-- InstanceEnd --></html>