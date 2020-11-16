<?php
    require_once "header.php";

$fruits = [
    'Orange' => 350,
    'Pomme' => 300,
    'Banane' => 200,
    'Ananas' => 500,
    'Mangue' => 50,
    'Papaye' => 500,
    'Poire' => 150
];
$total_fruits = [];
$total = 0;

if(isset($_GET['fruit'])){
    foreach($_GET['fruit'] as $fruit){
        if(isset($fruits[$fruit])){
            $total_fruits[] = $fruit;
            $total += $fruits[$fruit];
        }
    }
}
    $resultatRecherche = "";
    /**
     * USE : RECUPERE UN FRUIT DANS LE TABLEAU DE FRUITS
     * @param : string $fruit => un fruit
     * @return : string => Une chaine de caractère representant le message à afficher
     */
    
    function getFruit(string $fruit) : string
    {  
        global $fruits;
        $str = "Aucun prix pour $fruit";
        /*
            $exist = array_key_exists($fruit, $fruits);
            return ($exist) ? "$fruit à $fruits[$fruit] FCFA" : "Aucun prix pour $fruit";
        */
        foreach ($fruits as $key => $value) {
            if ($key === $fruit) {
                $str =  "$fruit à $fruits[$fruit] FCFA" ;
                break;  
            }
        }
        return $str;
    }
    if(isset($_GET['monfruit'])){
        $search = $_GET['monfruit'];
        $resultatRecherche = getFruit($search);    
    }
?>

<div class="row">
    <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                <h5 class="card-title">Vos fruits</h5>
                <ul>
                    <?php foreach($total_fruits as $total_fruit): ?>
                        <li><?= $total_fruit ?></li>
                    <?php endforeach ?> <br>
                <p>
                    <strong>Prix : </strong> <?= $total ?> FCFA
                </p>
                </ul>      
                </div>      
        </div>
        </div>

    <div class="col-md-6">
        <form action="fruit.php" method="GET">
            <h2>Choisisez vos fruits</h2>
            <?php foreach($fruits as $fruit => $prix): ?>
                    <div class="checkbox">
                        <label>
                            <?= get_fruits('fruit', $fruit, $_GET) ?> 
                            <?= $fruit ?> à <?= $prix ?>FCFA
                        </label>
                    </div>
            <?php endforeach ?> <br>
            <button class="btm btm-success" type="submit">Composer la liste de ses fruits</button>
        </form>
    </div>  
</div>

<div class="container mt-5">
    <div class="row m-auto justify-content-center">
        <div class="col-3 bg-light">
            <?= ($resultatRecherche !== "" ) ? $resultatRecherche : ""  ?>
        </div>
        <div class="col-4">
            <form class="form-inline" method="GET">
                <div class="form-group mb-2">
                    <input type="search" name="monfruit" class="form-control-plaintext" id="staticEmail2" placeholder="Votre fruit">
                </div>
                <button type="submit" name="btn_search" class="btn btn-primary mb-2">Chercher</button>
            </form>
        </div>
    </div>
</div>



