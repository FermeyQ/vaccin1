<?php include('inc/fonction.php') ?>
<?php //include ('inc/pdo/pdo.php');
$title = 'Accueil';
?>
<?php include('inc/header.php') ?>

<!-- SLIDERS LES MONDES PARALLELES -->
<div class='o-sliderContainer' id="pbSliderWrap0" style="margin-top:0;">
  <div class='o-slider' id='pbSlider0'>
    <div class="o-slider--item" data-image="asset/slider/images/vaccin2.jpg">
      <div class="o-slider-textWrap">
        <h1 class="o-slider-title" color='lime'>Bienvenue sur my Little CARNET !</h1>
        <p class="o-slider-paragraph">Le carnet de vaccination électronique que vous attendiez ! Se faire vacciner n'aura jamais été aussi simple !</p>
      </div>
    </div>
    <div class="o-slider--item" data-image="asset/slider/images/vaccin1.jpg">
      <div class="o-slider-textWrap">
        <h1 class="o-slider-title">C'est quoi un vaccin ?</h1>
        <span class="a-divider"></span>
        <p class="o-slider-paragraph">La vaccination est une protection contre une maladie infectieuse potentielle.</p>
      </div>
    </div>
    <div class="o-slider--item" data-image="asset/slider/images/vaccin3.jpg">
      <div class="o-slider-textWrap">
        <h1 class="o-slider-title">Principe du vaccin</h1>
        <span class="a-divider"></span>
        <p class="o-slider-paragraph">Il consiste à injecter dans le corps un agent infectieux (virus ou bactérie),
          sous une forme inoffensive mais stimulant la réponse immunitaire de l'organisme. Le système immunitaire
          disposant d'une forme de mémoire, une exposition ultérieure à l'agent infectieux déclenchera une réponse
          rapide et donc plus efficace. L'agent est reconnu par une ou plusieurs molécules spécifiques et constitue
          l'antigène. Le système immunitaire répond par la production d'anticorps spécialement dirigés contre lui et
          fabriqués par des cellules mémoires (lymphocytes B et T). Un vaccin est donc spécifique d'une maladie.</p>
      </div>
    </div>
    <div class="o-slider--item" data-image="asset/slider/images/vaccin4.jpg">
      <div class="o-slider-textWrap">
        <h1 class="o-slider-title">Vaccin : qu'injecte-t-on ?</h1>
        <span class="a-divider"></span>
        <p class="o-slider-paragraph">Le vaccin peut être un agent inactivé (dépourvu de matériel génétique) ou atténué
          (c'est alors une forme voisine mais non pathogène). Ce peut être également un sous-ensemble d'un virus voire
          une simple toxine traitée pour qu'elle soit sans effet pathogène mais qu'elle conserve ses propriétés
          antigéniques (cas du vaccin contre la diphtérie par exemple).</p>
      </div>
    </div>
    <div class="o-slider--item" data-image="asset/slider/images/vaccination_bg.jpg">
      <div class="o-slider-textWrap">
        <h1 class="o-slider-title">Utilisation de la vaccination</h1>
        <span class="a-divider"></span>
        <p class="o-slider-paragraph">La vaccination a un effet protecteur sur un individu mais, pour une maladie
          contagieuse, une vaccination massive protège la population toute entière en ralentissant ou en empêchant la
          propagation de l'agent infectieux.</p>
      </div>
    </div>
    <div class="o-slider--item" data-image="asset/slider/images/vaccination.jpg">
      <div class="o-slider-textWrap">
        <h1 class="o-slider-title">Quels sont les types de vaccins ?</h1>
        <span class="a-divider"></span>
        <p class="o-slider-paragraph">Il existe deux grands types de vaccins : les vaccins vivants atténués et les
          vaccins inactivés.Les vaccins vivants atténués sont constitués de germes (virus, bactérie) vivants qui ont
          été modifiés afin qu’ils perdent leur pouvoir infectieux en gardant leur capacité à induire une protection
          chez la personne vaccinée. Ce type de vaccins est très efficace ; mais parce qu’ils contiennent un agent
          infectieux vivant, ils sont (sauf exception) contre-indiqués chez les femmes enceintes et les personnes
          immunodéprimées.Les vaccins inactivés ne contiennent pas d’agents infectieux vivants. Ils peuvent contenir :
          soit un fragment de l’agent infectieux (sa paroi ou sa toxine), c’est le cas par exemple de l’hépatite B ou
          du tétanos; soit la totalité de l’agent infectieux qui est inactivé (coqueluche).</p>
      </div>
    </div>
    <div class="o-slider--item" data-image="asset/slider/images/vaccin3.jpg">
      <div class="o-slider-textWrap">
        <h1 class="o-slider-title">Que contiennnent les vaccins ?</h1>
        <span class="a-divider"></span>
        <p class="o-slider-paragraph">Les vaccins sont composés d’une ou plusieurs substances actives d’origine
          biologique appelées « antigènes vaccinaux » qui sont issus de bactéries ou de virus. Afin de rendre le vaccin
          plus efficace, l’antigène vaccinal est généralement combiné à un adjuvant qui est très souvent un sel
          d’aluminium (hydroxyde ou phosphate). Des conservateurs antimicrobiens peuvent être employés pour empêcher la
          contamination microbienne du vaccin. Des stabilisants (lactose, sorbitol etc.) peuvent être utilisés afin de
          maintenir la qualité du vaccin pendant toute sa durée de conservation.</p>
      </div>
    </div>
  </div>
</div>

<?php include('inc/footer.php');
?>
<script type="text/javascript">
  $('#pbSlider0').pbTouchSlider({
    slider_Wrap: '#pbSliderWrap0',
    slider_Item_Width: 100,
    slider_Threshold: 10,
    slider_Speed: 600,
    slider_Ease: 'ease-out',
    slider_Drag: true,
    slider_Arrows: {
      enabled: true
    },
    slider_Dots: {
      class: '.o-slider-pagination',
      enabled: true,
      preview: true
    },
    slider_Breakpoints: {
      default: {
        height: 1000
      },
      tablet: {
        height: 1000,
        media: 1024
      },
      smartphone: {
        height: 800,
        media: 768
      }
    }
  });
</script>
