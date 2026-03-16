<?php
/**
 * Front Page Template
 *
 * @package sai-europe
 */

get_header();

// Customizer values with defaults
$hero_eyebrow     = sai_get_option( 'hero_eyebrow',     'Strategische Agentur für Innovation in Europa' );
$hero_headline    = sai_get_option( 'hero_headline',    'Nur ein innovatives Europa ist ein souveränes Europa' );
$hero_highlighted = sai_get_option( 'hero_highlighted', 'innovatives Europa' );
$hero_lead        = sai_get_option( 'hero_lead',        'SAI Europe bringt innovative Impulse zu Themen wie europäischer Souveränität, Startups, Künstliche Intelligenz, Raumfahrt und Klima in den politischen Diskurs – und entwickelt Expertise in den Schlüsseltechnologien von morgen.' );
$hero_btn1_text   = sai_get_option( 'hero_btn1_text',   'Unsere Leistungen' );
$hero_btn1_link   = sai_get_option( 'hero_btn1_link',   '#leistungen' );
$hero_btn2_text   = sai_get_option( 'hero_btn2_text',   'Kontakt aufnehmen' );
$hero_btn2_link   = sai_get_option( 'hero_btn2_link',   '#kontakt' );
$contact_email    = sai_get_option( 'contact_email',    'Kontakt@sai-europe.org' );
$contact_address  = sai_get_option( 'contact_address',  'Linienstraße 86, 10119 Berlin' );
?>

<!-- ════════════════════════════════════════
     HERO
═════════════════════════════════════════ -->
<section class="hero" id="hero">
  <div class="container">
    <div class="hero-inner">

      <div class="hero-eyebrow">
        <span class="hero-eyebrow-dot"></span>
        <span class="hero-eyebrow-text"><?php echo esc_html( $hero_eyebrow ); ?></span>
      </div>

      <h1>
        <?php
        $headline = esc_html( $hero_headline );
        if ( $hero_highlighted ) {
            $headline = str_replace(
                esc_html( $hero_highlighted ),
                '<em>' . esc_html( $hero_highlighted ) . '</em>',
                $headline
            );
        }
        echo wp_kses( $headline, [ 'em' => [] ] );
        ?>
      </h1>

      <p class="hero-lead"><?php echo esc_html( $hero_lead ); ?></p>

      <div class="hero-actions">
        <a href="<?php echo esc_url( $hero_btn1_link ); ?>" class="btn btn--primary">
          <?php echo esc_html( $hero_btn1_text ); ?>
        </a>
        <a href="<?php echo esc_url( $hero_btn2_link ); ?>" class="btn btn--outline-white">
          <?php echo esc_html( $hero_btn2_text ); ?>
        </a>
      </div>

    </div>
  </div>

  <div class="hero-scroll" aria-hidden="true">
    <span class="hero-scroll-line"></span>
    <span class="hero-scroll-text">Scroll</span>
  </div>
</section>

<!-- ════════════════════════════════════════
     THEMEN-TAGS STRIP
═════════════════════════════════════════ -->
<div class="topics-strip">
  <div class="container">
    <ul class="topics-list" aria-label="<?php esc_attr_e( 'Themen', 'sai-europe' ); ?>">
      <li><span class="topic-tag"><span class="topic-tag-icon">🤖</span> Künstliche Intelligenz</span></li>
      <li><span class="topic-tag"><span class="topic-tag-icon">🚀</span> Raumfahrt</span></li>
      <li><span class="topic-tag"><span class="topic-tag-icon">🌿</span> Klima & Energie</span></li>
      <li><span class="topic-tag"><span class="topic-tag-icon">🌐</span> Digitale Gesellschaft</span></li>
      <li><span class="topic-tag"><span class="topic-tag-icon">🦄</span> Startups & Venture</span></li>
      <li><span class="topic-tag"><span class="topic-tag-icon">⚛️</span> Quantentechnologie</span></li>
      <li><span class="topic-tag"><span class="topic-tag-icon">🛡️</span> Europäische Souveränität</span></li>
    </ul>
  </div>
</div>

<!-- ════════════════════════════════════════
     MISSION / ÜBER UNS
═════════════════════════════════════════ -->
<section class="section" id="mission">
  <div class="container">
    <div class="mission-grid">

      <!-- Visual (hidden on mobile) -->
      <div class="mission-visual" aria-hidden="true">
        <div class="mission-card-stack">
          <div class="mission-card mission-card--main">
            <div class="mission-stat">2025</div>
            <div class="mission-stat-label">Gründungsjahr</div>
            <p style="color:rgba(255,255,255,0.55);font-size:.9rem;margin-top:1.25rem;margin-bottom:0;">
              Ein neues Kapitel für europäische Innovationspolitik – mit Erfahrung, Netzwerk und Leidenschaft.
            </p>
          </div>
          <div class="mission-card mission-card--accent">
            <div class="mission-stat mission-stat--dark">EU</div>
            <div class="mission-stat-label mission-stat-label--dark">Fokus: Europa</div>
          </div>
        </div>
      </div>

      <!-- Content -->
      <div class="mission-content reveal">
        <span class="section-label">Über SAI Europe</span>
        <h2 class="section-heading">
          <?php esc_html_e( 'Innovation beschleunigen – für ein souveränes Europa', 'sai-europe' ); ?>
        </h2>
        <p class="section-sub">
          <?php esc_html_e( 'SAI Europe wurde mit dem Ziel gegründet, Innovationen made in Europe zu beschleunigen. Wir sehen Europa als Pionier bei der Bewältigung gesellschaftlicher Herausforderungen – vom Klimaschutz über Sicherheit bis hin zur digitalen Gesellschaft und demokratischer Resilienz.', 'sai-europe' ); ?>
        </p>
        <ul class="mission-list">
          <li>
            <span class="mission-list-icon">✓</span>
            <?php esc_html_e( 'Innovative Impulse für den politischen Diskurs', 'sai-europe' ); ?>
          </li>
          <li>
            <span class="mission-list-icon">✓</span>
            <?php esc_html_e( 'Expertise in KI, Raumfahrt, Klima und Quantentechnologie', 'sai-europe' ); ?>
          </li>
          <li>
            <span class="mission-list-icon">✓</span>
            <?php esc_html_e( 'Vernetzung von Startups, Politik, Wissenschaft und Industrie', 'sai-europe' ); ?>
          </li>
          <li>
            <span class="mission-list-icon">✓</span>
            <?php esc_html_e( 'Entwicklung neuer Förder- und Wettbewerbsformate', 'sai-europe' ); ?>
          </li>
          <li>
            <span class="mission-list-icon">✓</span>
            <?php esc_html_e( 'Strategische Kommunikation für Innovationsprojekte', 'sai-europe' ); ?>
          </li>
        </ul>
        <a href="#leistungen" class="btn btn--outline-navy">
          <?php esc_html_e( 'Unsere Leistungen entdecken', 'sai-europe' ); ?>
        </a>
      </div>

    </div>
  </div>
</section>

<!-- ════════════════════════════════════════
     LEISTUNGEN
═════════════════════════════════════════ -->
<section class="section section--off-white" id="leistungen">
  <div class="container">
    <div class="text-center reveal">
      <span class="section-label"><?php esc_html_e( 'Was wir tun', 'sai-europe' ); ?></span>
      <h2 class="section-heading">
        <?php esc_html_e( 'Unsere Leistungen', 'sai-europe' ); ?>
      </h2>
      <p class="section-sub" style="margin:0 auto;">
        <?php esc_html_e( 'Wir begleiten Entscheidungsträger in Politik und Verwaltung sowie Unternehmer in Industrie und Startups – von der Konzeption bis zur Umsetzung.', 'sai-europe' ); ?>
      </p>
    </div>

    <div class="services-grid">

      <div class="service-card reveal reveal-delay-1">
        <div class="service-icon">🏛️</div>
        <h3><?php esc_html_e( 'Politikberatung & Strategie', 'sai-europe' ); ?></h3>
        <p>
          <?php esc_html_e( 'Wir unterstützen Politik und Verwaltung bei der Entwicklung und Umsetzung neuer Förderformate. Dabei setzen wir auf wettbewerbsorientierte Ansätze, die Innovationen systematisch in die Märkte bringen.', 'sai-europe' ); ?>
        </p>
        <div class="service-tags">
          <span class="service-tag">Förderpolitik</span>
          <span class="service-tag">Regulierung</span>
          <span class="service-tag">Strategie</span>
        </div>
      </div>

      <div class="service-card reveal reveal-delay-2">
        <div class="service-icon">📢</div>
        <h3><?php esc_html_e( 'Strategische Kommunikation', 'sai-europe' ); ?></h3>
        <p>
          <?php esc_html_e( 'Von Social-Media-Strategien bis hin zu visuellen Themen und crossmedialen Kampagnen – wir stärken die Sichtbarkeit innovativer Projekte und sorgen dafür, dass ihr Potenzial in Politik und Öffentlichkeit wahrgenommen wird.', 'sai-europe' ); ?>
        </p>
        <div class="service-tags">
          <span class="service-tag">Public Affairs</span>
          <span class="service-tag">Kampagnen</span>
          <span class="service-tag">Social Media</span>
        </div>
      </div>

      <div class="service-card reveal reveal-delay-3">
        <div class="service-icon">🔗</div>
        <h3><?php esc_html_e( 'Vernetzung & Ökosystem', 'sai-europe' ); ?></h3>
        <p>
          <?php esc_html_e( 'Wir verbinden Startups, Wagniskapitalgeber, Ministerien, Behörden und Verbände. Für alle, die die richtigen Partner oder Kunden für die strategische Platzierung neuer Entwicklungen suchen, sind wir der effektive Wegbegleiter.', 'sai-europe' ); ?>
        </p>
        <div class="service-tags">
          <span class="service-tag">Netzwerke</span>
          <span class="service-tag">Stakeholder</span>
          <span class="service-tag">Ökosystem</span>
        </div>
      </div>

      <div class="service-card reveal reveal-delay-1">
        <div class="service-icon">🎓</div>
        <h3><?php esc_html_e( 'Talententwicklung & Kooperation', 'sai-europe' ); ?></h3>
        <p>
          <?php esc_html_e( 'Wir begleiten Unternehmen und Organisationen bei der Verbesserung der Talententwicklung durch enge Kooperation mit Forschung und Wissenschaft – für eine Innovationskultur, die nachhaltig wirkt.', 'sai-europe' ); ?>
        </p>
        <div class="service-tags">
          <span class="service-tag">HR & Talent</span>
          <span class="service-tag">Forschung</span>
          <span class="service-tag">Transfer</span>
        </div>
      </div>

      <div class="service-card reveal reveal-delay-2">
        <div class="service-icon">🗣️</div>
        <h3><?php esc_html_e( 'Partizipationsformate', 'sai-europe' ); ?></h3>
        <p>
          <?php esc_html_e( 'Wir gestalten Beteiligungsformate, die Stakeholder oder die breite Öffentlichkeit in die Debatte einbeziehen und an der Gestaltung neuer Technologien beteiligen – Innovation als gesellschaftlicher Diskurs.', 'sai-europe' ); ?>
        </p>
        <div class="service-tags">
          <span class="service-tag">Beteiligung</span>
          <span class="service-tag">Formate</span>
          <span class="service-tag">Dialog</span>
        </div>
      </div>

      <div class="service-card reveal reveal-delay-3">
        <div class="service-icon">📄</div>
        <h3><?php esc_html_e( 'Whitepapers & Gutachten', 'sai-europe' ); ?></h3>
        <p>
          <?php esc_html_e( 'Wir erstellen fundierte Analysen, Whitepapers und Gutachten zu zentralen Innovationsthemen – von KI-Governance bis zu Raumfahrtpolitik – und machen komplexe Zusammenhänge entscheidungsfähig.', 'sai-europe' ); ?>
        </p>
        <div class="service-tags">
          <span class="service-tag">Analyse</span>
          <span class="service-tag">Research</span>
          <span class="service-tag">Policy</span>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ════════════════════════════════════════
     STATEMENT / ZITAT
═════════════════════════════════════════ -->
<section class="statement-section">
  <div class="container">
    <p class="statement-quote">
      <?php esc_html_e( '„Nur ein innovatives Europa ist ein souveränes Europa."', 'sai-europe' ); ?>
    </p>
    <p class="statement-author">
      — Dr. Anna Christmann, <?php esc_html_e( 'Gründerin & Geschäftsführerin', 'sai-europe' ); ?>
    </p>
  </div>
</section>

<!-- ════════════════════════════════════════
     THEMEN
═════════════════════════════════════════ -->
<section class="section themes-section" id="themen">
  <div class="container">
    <div class="themes-intro reveal">
      <span class="section-label" style="color:var(--accent);">
        <?php esc_html_e( 'Schwerpunkte', 'sai-europe' ); ?>
      </span>
      <h2 class="section-heading section-heading--white">
        <?php esc_html_e( 'Unsere Themengebiete', 'sai-europe' ); ?>
      </h2>
      <p class="section-sub section-sub--white" style="margin:0 auto;">
        <?php esc_html_e( 'Wir entwickeln Expertise in den Schlüsseltechnologien, die Europa voranbringen – von Künstlicher Intelligenz bis Quantencomputing.', 'sai-europe' ); ?>
      </p>
    </div>

    <div class="themes-grid">

      <div class="theme-item reveal">
        <div class="theme-number">01</div>
        <div class="theme-icon">🤖</div>
        <h3><?php esc_html_e( 'Künstliche Intelligenz', 'sai-europe' ); ?></h3>
        <p>
          <?php esc_html_e( 'Von KI-Governance und EU AI Act bis zu konkreten Anwendungen in Industrie und Verwaltung. Durch die Arbeit in der Enquete-Kommission KI und im UN High Level Advisory Body on AI verfügen wir über tiefe Expertise in diesem Bereich.', 'sai-europe' ); ?>
        </p>
        <a href="#kontakt" class="theme-item-link">
          <?php esc_html_e( 'Mehr erfahren', 'sai-europe' ); ?> <span>→</span>
        </a>
      </div>

      <div class="theme-item reveal reveal-delay-1">
        <div class="theme-number">02</div>
        <div class="theme-icon">🚀</div>
        <h3><?php esc_html_e( 'Raumfahrt & New Space', 'sai-europe' ); ?></h3>
        <p>
          <?php esc_html_e( 'Als Koordinatorin der Bundesregierung für die deutsche Raumfahrt (2022–2025) hat Dr. Christmann Initiativen wie den European Launcher Challenge mitgeprägt. New Space braucht neue Politik – wir begleiten diesen Wandel.', 'sai-europe' ); ?>
        </p>
        <a href="#kontakt" class="theme-item-link">
          <?php esc_html_e( 'Mehr erfahren', 'sai-europe' ); ?> <span>→</span>
        </a>
      </div>

      <div class="theme-item reveal reveal-delay-2">
        <div class="theme-number">03</div>
        <div class="theme-icon">🌿</div>
        <h3><?php esc_html_e( 'Klima & Energie', 'sai-europe' ); ?></h3>
        <p>
          <?php esc_html_e( 'Klimaschutz und Energiewende sind keine Widersprüche zur Wettbewerbsfähigkeit – sie sind Innovationstreiber. Wir verbinden technologischen Fortschritt mit Klimazielen und entwickeln Strategien für eine grüne Industriepolitik.', 'sai-europe' ); ?>
        </p>
        <a href="#kontakt" class="theme-item-link">
          <?php esc_html_e( 'Mehr erfahren', 'sai-europe' ); ?> <span>→</span>
        </a>
      </div>

      <div class="theme-item reveal reveal-delay-3">
        <div class="theme-number">04</div>
        <div class="theme-icon">🦄</div>
        <h3><?php esc_html_e( 'Startups & Venture Capital', 'sai-europe' ); ?></h3>
        <p>
          <?php esc_html_e( 'Als Beauftragter für die Digitale Wirtschaft und Startups im BMWK waren europäische Startup-Ökosysteme ein Schwerpunkt. Vom Leuchtturmwettbewerb Startup Factories bis zu Wagniskapitalreformen – wir kennen das Ökosystem.', 'sai-europe' ); ?>
        </p>
        <a href="#kontakt" class="theme-item-link">
          <?php esc_html_e( 'Mehr erfahren', 'sai-europe' ); ?> <span>→</span>
        </a>
      </div>

      <div class="theme-item reveal">
        <div class="theme-number">05</div>
        <div class="theme-icon">🌐</div>
        <h3><?php esc_html_e( 'Digitale Gesellschaft', 'sai-europe' ); ?></h3>
        <p>
          <?php esc_html_e( 'Die digitale Transformation betrifft alle Lebensbereiche. Wir unterstützen bei der Gestaltung digitaler Infrastrukturen, Datenpolitik und der Frage, wie eine demokratische digitale Gesellschaft aussehen kann.', 'sai-europe' ); ?>
        </p>
        <a href="#kontakt" class="theme-item-link">
          <?php esc_html_e( 'Mehr erfahren', 'sai-europe' ); ?> <span>→</span>
        </a>
      </div>

      <div class="theme-item reveal reveal-delay-1">
        <div class="theme-number">06</div>
        <div class="theme-icon">⚛️</div>
        <h3><?php esc_html_e( 'Quantentechnologie', 'sai-europe' ); ?></h3>
        <p>
          <?php esc_html_e( 'Quantencomputing, Quantenkommunikation und Quantensensorik – Schlüsseltechnologien für Europas technologische Souveränität. Wir begleiten Politik und Unternehmen bei der strategischen Positionierung in diesem Zukunftsfeld.', 'sai-europe' ); ?>
        </p>
        <a href="#kontakt" class="theme-item-link">
          <?php esc_html_e( 'Mehr erfahren', 'sai-europe' ); ?> <span>→</span>
        </a>
      </div>

    </div>
  </div>
</section>

<!-- ════════════════════════════════════════
     TEAM
═════════════════════════════════════════ -->
<section class="section" id="team">
  <div class="container">
    <div class="text-center reveal">
      <span class="section-label"><?php esc_html_e( 'Wer wir sind', 'sai-europe' ); ?></span>
      <h2 class="section-heading">
        <?php esc_html_e( 'Das Team', 'sai-europe' ); ?>
      </h2>
      <p class="section-sub" style="margin:0 auto;">
        <?php esc_html_e( 'Erfahrung aus Politik, Technologie und Kommunikation – vereint für ein innovatives Europa.', 'sai-europe' ); ?>
      </p>
    </div>

    <div class="team-grid">

      <!-- Dr. Anna Christmann -->
      <div class="team-card reveal reveal-delay-1">
        <div class="team-photo">
          <div class="team-photo-initials">AC</div>
        </div>
        <div class="team-info">
          <h3 class="team-name">Dr. Anna Christmann</h3>
          <p class="team-title"><?php esc_html_e( 'Gründerin & Geschäftsführerin', 'sai-europe' ); ?></p>
          <p class="team-bio">
            <?php esc_html_e( 'Politikwissenschaftlerin mit Studium an den Universitäten Heidelberg und Bern sowie Forschungsaufenthalten an der UC Irvine und der Universität Zürich. Von 2017 bis 2025 Mitglied des Deutschen Bundestages mit Fokus auf Innovationspolitik, von 2022 bis 2025 Koordinatorin der Bundesregierung für die deutsche Raumfahrt und Beauftragte für die Digitale Wirtschaft und Startups im BMWK. Mitglied im UN High Level Advisory Body on AI. 2025 nominiert für die Rudolf-Diesel-Medaille.', 'sai-europe' ); ?>
          </p>
          <div class="team-tags">
            <span class="team-tag">Innovationspolitik</span>
            <span class="team-tag">Raumfahrt</span>
            <span class="team-tag">KI-Governance</span>
            <span class="team-tag">Startups</span>
            <span class="team-tag">Bundestag</span>
          </div>
        </div>
      </div>

      <!-- Sarkis Bisanz -->
      <div class="team-card reveal reveal-delay-2">
        <div class="team-photo">
          <div class="team-photo-initials">SB</div>
        </div>
        <div class="team-info">
          <h3 class="team-name">Sarkis Bisanz</h3>
          <p class="team-title"><?php esc_html_e( 'Partner & Public Affairs', 'sai-europe' ); ?></p>
          <p class="team-bio">
            <?php esc_html_e( 'Über 15 Jahre Erfahrung an der Schnittstelle von Politik, Technologie und Kommunikation. Er berät Unternehmen, Startups und Institutionen bei der Erlangung strategischer Sichtbarkeit. Als Public-Affairs-Experte und politischer Berater – unter anderem für die Bundestagsfraktion von Bündnis 90/Die Grünen – verfügt er über tiefes Wissen in der Positionierung technologischer Innovation in der Öffentlichkeit.', 'sai-europe' ); ?>
          </p>
          <div class="team-tags">
            <span class="team-tag">Public Affairs</span>
            <span class="team-tag">Kommunikation</span>
            <span class="team-tag">Politikberatung</span>
            <span class="team-tag">Technologie</span>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ════════════════════════════════════════
     PARTNER / NETZWERK
═════════════════════════════════════════ -->
<div class="partners-section">
  <div class="container">
    <p class="partners-label"><?php esc_html_e( 'Vernetzt mit führenden Akteuren', 'sai-europe' ); ?></p>
    <div class="partners-logos">
      <span class="partner-logo">Bundestag</span>
      <span class="partner-logo">BMWK</span>
      <span class="partner-logo">EU-Kommission</span>
      <span class="partner-logo">DLR</span>
      <span class="partner-logo">Hightech Forum</span>
      <span class="partner-logo">Sprind</span>
      <span class="partner-logo">UN AI Board</span>
    </div>
  </div>
</div>

<!-- ════════════════════════════════════════
     KONTAKT
═════════════════════════════════════════ -->
<section class="section contact-section" id="kontakt">
  <div class="container">
    <div class="contact-grid">

      <!-- Contact Info -->
      <div class="contact-info reveal">
        <span class="section-label" style="color:var(--accent);">
          <?php esc_html_e( 'Zusammenarbeiten', 'sai-europe' ); ?>
        </span>
        <h2>
          <?php esc_html_e( 'Lassen Sie uns sprechen', 'sai-europe' ); ?>
        </h2>
        <p style="color:rgba(255,255,255,0.65);margin-bottom:0;">
          <?php esc_html_e( 'Sie möchten Innovation in Europa voranbringen? Sprechen Sie mit uns – wir begleiten Sie von der ersten Idee bis zur erfolgreichen Umsetzung.', 'sai-europe' ); ?>
        </p>

        <div class="contact-details">

          <div class="contact-item">
            <div class="contact-item-icon">✉️</div>
            <div class="contact-item-text">
              <strong><?php esc_html_e( 'E-Mail', 'sai-europe' ); ?></strong>
              <span>
                <a href="mailto:<?php echo esc_attr( $contact_email ); ?>">
                  <?php echo esc_html( $contact_email ); ?>
                </a>
              </span>
            </div>
          </div>

          <div class="contact-item">
            <div class="contact-item-icon">📍</div>
            <div class="contact-item-text">
              <strong><?php esc_html_e( 'Adresse', 'sai-europe' ); ?></strong>
              <span><?php echo esc_html( $contact_address ); ?></span>
            </div>
          </div>

          <div class="contact-item">
            <div class="contact-item-icon">🏢</div>
            <div class="contact-item-text">
              <strong><?php esc_html_e( 'Handelsregister', 'sai-europe' ); ?></strong>
              <span>
                <?php esc_html_e( 'SAI Europe GmbH · HRB 278517 B', 'sai-europe' ); ?>
              </span>
            </div>
          </div>

        </div>

        <a href="mailto:<?php echo esc_attr( $contact_email ); ?>" class="btn btn--primary">
          <?php esc_html_e( 'E-Mail senden', 'sai-europe' ); ?>
        </a>
      </div>

      <!-- Contact Form -->
      <div class="contact-form-wrap reveal reveal-delay-2">
        <h3><?php esc_html_e( 'Nachricht senden', 'sai-europe' ); ?></h3>

        <form id="sai-contact-form" novalidate>
          <?php wp_nonce_field( 'sai_contact_nonce', 'sai_nonce' ); ?>

          <div class="form-row">
            <div class="form-group">
              <label for="contact-name"><?php esc_html_e( 'Name *', 'sai-europe' ); ?></label>
              <input type="text" id="contact-name" name="name"
                     placeholder="<?php esc_attr_e( 'Ihr Name', 'sai-europe' ); ?>"
                     required autocomplete="name">
            </div>
            <div class="form-group">
              <label for="contact-email"><?php esc_html_e( 'E-Mail *', 'sai-europe' ); ?></label>
              <input type="email" id="contact-email" name="email"
                     placeholder="<?php esc_attr_e( 'ihre@email.de', 'sai-europe' ); ?>"
                     required autocomplete="email">
            </div>
          </div>

          <div class="form-group">
            <label for="contact-org"><?php esc_html_e( 'Organisation', 'sai-europe' ); ?></label>
            <input type="text" id="contact-org" name="organisation"
                   placeholder="<?php esc_attr_e( 'Ihr Unternehmen / Ihre Organisation', 'sai-europe' ); ?>"
                   autocomplete="organization">
          </div>

          <div class="form-group">
            <label for="contact-subject"><?php esc_html_e( 'Betreff', 'sai-europe' ); ?></label>
            <select id="contact-subject" name="betreff">
              <option value=""><?php esc_html_e( 'Bitte wählen…', 'sai-europe' ); ?></option>
              <option value="Politikberatung"><?php esc_html_e( 'Politikberatung & Strategie', 'sai-europe' ); ?></option>
              <option value="Kommunikation"><?php esc_html_e( 'Strategische Kommunikation', 'sai-europe' ); ?></option>
              <option value="Vernetzung"><?php esc_html_e( 'Vernetzung & Ökosystem', 'sai-europe' ); ?></option>
              <option value="Whitepaper"><?php esc_html_e( 'Whitepapers & Gutachten', 'sai-europe' ); ?></option>
              <option value="Sonstiges"><?php esc_html_e( 'Sonstiges', 'sai-europe' ); ?></option>
            </select>
          </div>

          <div class="form-group">
            <label for="contact-message"><?php esc_html_e( 'Nachricht *', 'sai-europe' ); ?></label>
            <textarea id="contact-message" name="nachricht" rows="5"
                      placeholder="<?php esc_attr_e( 'Wie können wir Ihnen helfen?', 'sai-europe' ); ?>"
                      required></textarea>
          </div>

          <div id="form-message" style="display:none;padding:.75rem 1rem;border-radius:var(--radius);margin-bottom:1rem;font-size:.9rem;"></div>

          <button type="submit" class="form-submit" id="form-submit">
            <?php esc_html_e( 'Nachricht senden', 'sai-europe' ); ?>
          </button>
        </form>
      </div>

    </div>
  </div>
</section>

<?php get_footer(); ?>
