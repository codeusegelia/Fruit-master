<?php
  function nav_item(string $lien, string $titre, string $linkClass = ''): string
  {
    $classe = 'nav_item';
    if($_SERVER['SCRIPT_NAME'] === $lien){
      $classe .= ' active ';
    }
    return <<<HTML
      <li class=" $classe">
            <a class="$linkClass" href=" $lien"> $titre</a> 
      </li>
HTML;
  }

  function nav_menu(string $linkClass = ''): string 
{
  return
      nav_item('index.php', '', $linkClass) .
      nav_item('contact.php', '', $linkClass);
}

function checkbox(string $name, string $value, array $data): string 
{
  $attributes = '';
  if(isset($data[$name]) && in_array($value, $data[$name])){
    $attributes .= 'checked'; 
  }
  return <<<HTML
      <input type="checkbox" name="{$name}[]" value="$value" $attributes/>
HTML;
}
 
function radio(string $name, string $value, array $data): string 
{
  $attributes = '';
  if(isset($data[$name]) && $value === $data[$name]){
    $attributes .= 'checked'; 
  }
  return <<<HTML
      <input type="radio" name="$name" value="$value" $attributes/>
HTML;
}
function dump($variable){
  echo "<pre>";
    var_dump($variable);
  echo "</pre>";
}
function creneaux_html(array $creneaux){
    if(count($creneaux) === 0){
      return 'Fermé';
  }//ou if(empty($creneaux)) pour verifier si le tableau est vide
    $phrases = [];
    foreach ($creneaux as $creneau){
      $phrases[] = "<strong>{$creneau[0]}h</strong> à <strong>{$creneau[1]}h</strong>";
    }
    return "Ouvert de " .  implode(' et de ', $phrases);
}

function in_creneaux (int $heure, array $creneaux): bool
{
  foreach($creneaux as $creneau){
    $debut = $creneau[0];
    $fin = $creneau[1];
    if($debut <= $heure && $heure < $fin){
      return true;
    } 
  }return false;
}

function select(string $name, $value, array $options): string {
  $html_options = [];
  foreach ($options as $keys => $option) {
    $attributes = $keys == $value ? ' selected ' : '';
    $html_options[] = "<option value='$keys' $attributes>$option</option>";
  }
  return "<select class='form-control' name='$name' >" . implode($html_options) . "</select>";
}


function get_fruits(string $name, string $value, array $data): string 
{
  $attributes = '';
  if(isset($data[$name]) && in_array($value, $data[$name])){
    $attributes .= 'checked'; 
  }
  return <<<HTML
      <input type="checkbox" name="{$name}[]" value="$value" $attributes/>
HTML;
}
 

?>