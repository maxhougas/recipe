<?php
  $head1 = "<!DOCTYPE html>\n<html lang=\"en\">\n<head>\n  <meta charset=\"UTF-8\">\n  <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\n  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\n  <title>";
  $head2 = "</title>\n  <link rel=\"stylesheet\" href=\"./styles.css\"></link>\n</head>\n<body>\n";
  $tail = "</body>\n</html>";

  if($_GET["recipe"] == NULL)
  {
    $title = "Baller Recipes";
  }
  else if($_GET["recipe"] == 'bitchinbagels')
  {
    $title = "Bitchin' Bagels";
    $imglnk = '1024px-Bagel-Plain-Alt.jpg';
    $instructions = array
    (
      'Get bagel',
      'Get peanutbutter',
      'Void bowels',
      'Transfer peanut butter to bagel using tongue',
      'Enjoy'
    );
  }
  else if($_GET["recipe"] == 'cabbagechili')
  {
    $title = "Cabbage Chili";
    $imglnk = 'DF.01.178-e1549747371178-2048x2048.jpg';
    $instructions = array
    (
      'Get cabbage',
      'Get jalapeno',
      'Chop cabbage',
      'Blend chopped cabbage and jalapeno together',
      'Insufflate mixture'
    );
  }
  else if($_GET["recipe"] == 'frigginchicken')
  {
    $title = "Friggin' Chicken";
    $imglnk = 'Carla-Halls-Fried-Chicken-1.jpg';
    $instructions = array
    (
      'Get chicken',
      'Rub chicken into eyes',
      'Salmonella!'
    );
  }
  else
  {
    $title = "Baller Recipes";
  }

  function mklink($txt,$dest)
  {
    return "<a href=\"$dest\">$txt</a>\n";
  }

  function mkimg($imglnk)
  {
    return "<img src= \"$imglnk\"></img>\n";
  }

  function listels($els)
  {
    $lis = '';
    foreach($els as $el)
      $lis = $lis."<li>$el</li>\n";
    return $lis;
  }

  function ollist($els)
  {
    return "<ol>\n".listels($els)."</ol>\n";
  }

  function ullist($els)
  {
    return "<ul>\n".listels($els)."</ul>\n";
  }

  function mkdiv($class,$payload)
  {
    return "<div class=\"".$class."\">\n".$payload."</div>\n";
  }

  function gohome()
  {
    return mkdiv('gohome',mklink('Home','./index.php'));
  }

  function banner($txt)
  {
    $payload = "<h1>".$txt."</h1>\n";
    return mkdiv('banner',$payload);
  }

  function franzlizt($payload)
  {
    $lnks = array();
    for($i=0;$i<count($payload);$i+=2)
    {
      $lnks[$i/2] = mklink($payload[$i],$payload[$i+1]);
    }

    $lst = ollist($lnks);
    return mkdiv('franzlizt',$lst);
  }

  function indexpage()
  {
   // echo banner('Baller Recipes');
    $lizt = array
    (
      "Bitchin' Bagels",'./index.php?recipe=bitchinbagels',
      "Cabbage Chili", './index.php?recipe=cabbagechili',
      "Friggin' Chicken", './index.php?recipe=frigginchicken'
    );
    //echo ollist($lizt);
    echo franzlizt($lizt);
  }

  function sidebyside($imglnk,$instructions)
  {
    $imgtg = mkimg($imglnk);
    $left = mkdiv('halfscreen rightside',$imgtg);
    $inslist = ullist($instructions);
    $right = mkdiv('halfscreen leftside',$inslist);
    $leftright = $left.$right;
    return mkdiv('sidebyside',$leftright);
  }

  function recipepage($imglnk,$instructions)
  {
    echo sidebyside($imglnk,$instructions);
    echo gohome();
  }

  echo $head1;
  echo $title;
  echo $head2;
  echo banner($title);
  if($title == 'Baller Recipes')
   indexpage();
  else
   recipepage($imglnk,$instructions);
  echo $tail;
?>