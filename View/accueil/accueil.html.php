<div id='accueil' class="w100 ">
    <div class="banner">
        <video autoplay loop muted width="100%">
            <source src="Public/video/hero.mp4">
        </video>
    </div>
    <?php if(isset($_GET['name'])){
        $name=$_GET["name"];
    }else{
        $name='';
    }
    ?>
    <h1><?=$name?></h1>
</div>