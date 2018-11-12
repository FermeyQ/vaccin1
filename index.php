<?php include ('inc/fonction.php') ?>
<?php include ('inc/pdo.php');
$title = 'Accueil';
debug ($_SESSION);
?>
<?php include ('inc/header.php') ?>
<h1>Accueil</h1>
<section id="vaccins">

    <h2>C'est quoi un vaccin?</h2>
    <p>La vaccination est une protection contre une maladie infectieuse potentielle.</p>
    <h2>Principe du vaccin</h2>
    <p>Il consiste à injecter dans le corps un agent infectieux (virus ou bactérie), sous une forme inoffensive mais stimulant la réponse immunitaire de l'organisme. Le système immunitaire disposant d'une forme de mémoire, une exposition ultérieure à l'agent infectieux déclenchera une réponse rapide et donc plus efficace. L'agent est reconnu par une ou plusieurs molécules spécifiques et constitue l'antigène. Le système immunitaire répond par la production d'anticorps spécialement dirigés contre lui et fabriqués par des cellules mémoires (lymphocytes B et T). Un vaccin est donc spécifique d'une maladie.</p>
    <h2>Vaccin : qu'injecte-t-on ?</h2>
    <p>Le vaccin peut être un agent inactivé (dépourvu de matériel génétique) ou atténué (c'est alors une forme voisine mais non pathogène). Ce peut être également un sous-ensemble d'un virus voire une simple toxine traitée pour qu'elle soit sans effet pathogène mais qu'elle conserve ses propriétés antigéniques (cas du vaccin contre la diphtérie par exemple).</p>
    <h2>Utilisation de la vaccination</h2>
    <p>La vaccination a un effet protecteur sur un individu mais, pour une maladie contagieuse, une vaccination massive protège la population toute entière en ralentissant ou en empêchant la propagation de l'agent infectieux.</p>

    <h2>Quels sont les types de vaccins?</h2>
    <p>Il existe deux grands types de vaccins : les vaccins vivants atténués et les vaccins inactivés.Les vaccins vivants atténués sont constitués de germes (virus, bactérie) vivants qui ont été modifiés afin qu’ils perdent leur pouvoir infectieux en gardant leur capacité à induire une protection chez la personne vaccinée. Ce type de vaccins est très efficace ; mais parce qu’ils contiennent un agent infectieux vivant, ils sont (sauf exception) contre-indiqués chez les femmes enceintes et les personnes immunodéprimées.Les vaccins inactivés ne contiennent pas d’agents infectieux vivants. Ils peuvent contenir : soit un fragment de l’agent infectieux (sa paroi ou sa toxine), c’est le cas par exemple de l’hépatite B ou du tétanos; soit la totalité de l’agent infectieux qui est inactivé (coqueluche).</p>

    <h2>Que contiennnent les vaccins?</h2>
    <p>Les vaccins sont composés d’une ou plusieurs substances actives d’origine biologique appelées « antigènes vaccinaux » qui sont issus de bactéries ou de virus. Afin de rendre le vaccin plus efficace, l’antigène vaccinal est généralement combiné à un adjuvant qui est très souvent un sel d’aluminium (hydroxyde ou phosphate). Des conservateurs antimicrobiens peuvent être employés pour empêcher la contamination microbienne du vaccin. Des stabilisants (lactose, sorbitol etc.) peuvent être utilisés afin de maintenir la qualité du vaccin pendant toute sa durée de conservation.</p>

    <h2>Quels sont les vaccins obligatoires?</h2>
    <p>Les 11 vaccinations obligatoires sont les suivantes :</p>
    <ul class="vaccins_oblig">
      <li>diphtérie, tétanos et poliomyélite (DTP)</li>
      <li>coqueluche : TETRAVAC-ACELLULAIRE, INFANRIX, INFANRIX HEXA, HEXYON, VAXELIS</li>
      <li>infections invasives à Haemophilus influenzae de type b : INFANRIX HEXA, HEXYON, VAXELIS.</li>
      <li>hépatite B : ENGERIX</li>
      <li>infections invasives à pneumocoque : PREVENAR</li>
      <li>méningocoque de sérogroupe C : MENVEO, NIMENRIX</li>
      <li>rougeole, oreillons et rubéole : PRIORIX </li>
    </ul>
</section>

  <h2><a href="lesvaccins.php">Voir la liste des principaux vaccins</a></h2>
<?php include ('inc/footer.php')?>
