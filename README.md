# Centro Duplicazioni Chiavi - base di sviluppo

Tema WordPress classico vuoto, basato sulla struttura del progetto originale.
Usa Vite, Bootstrap 5.3, Popper e Sass. Header, footer e cartelle di blocchi,
immagini sono pronti per lo sviluppo, senza contenuti predefiniti. Il CPT News e' registrato.

## Requisiti e avvio

- WordPress installato separatamente, con PHP configurato sul server.
- Node.js `^20.19.0 || >=22.12.0` e npm.
- Secure Custom Fields (SCF), opzionale, per impostazioni e blocchi del tema.

Installare il progetto in `wp-content/themes/centro-duplicazioni-chiavi`,
oppure sincronizzarlo con la cartella del tema sul server. Poi eseguire:

```sh
npm install
npm run build
```

Attivare **Centro Duplicazioni Chiavi** da **Aspetto > Temi** in WordPress.
Durante lo sviluppo eseguire:

```sh
npm run dev
```

`dev` compila gli asset in watch. Visitare il sito WordPress e ricaricare la pagina
dopo le modifiche: non avvia un server Vite con HMR.

## Struttura

```text
configure/                 Setup WordPress e caricamento CSS/JS
helper/menu.php            Registrazione posizioni menu header e footer
cpt/                       CPT News e futuri custom post type
extensions/scf/
  scf.php                  Integrazione opzionale SCF e registrazione blocchi
  fields/options.php       Pagina Impostazioni tema, senza campi predefiniti
  json/                    JSON dei futuri gruppi di campi
partials/                  Navigazione e footer da sviluppare
templates/
  content-page.php         Contenuto di pagine e singoli articoli
  content-loop.php         Loop WordPress essenziale
  blocks/                  Futuri blocchi personalizzati; inizialmente vuota
assets/
  images/                  Immagini del nuovo progetto; inizialmente vuota
  src/
    js/main.js             Bootstrap JS, componenti e raccolta asset dei blocchi
    js/components/         Futuri componenti JavaScript condivisi
    css/main.css           CSS aggiuntivo del tema
    scss/main.scss         Entry point Sass con Bootstrap
    scss/abstracts/         Futuri override delle variabili Bootstrap
    scss/components/        Futuri stili di header e footer
  dist/                    Asset generati dalla compilazione
```

## Bootstrap e stili

Bootstrap e Popper sono dichiarati in `package.json`. `assets/src/js/main.js`
importa il JavaScript di Bootstrap e il foglio Sass principale, senza CDN.
I componenti con attributi `data-bs-*` sono disponibili dopo la compilazione;
tooltip e popover richiedono la propria inizializzazione JavaScript.

Per personalizzare Bootstrap, definire gli override in
`assets/src/scss/abstracts/_variables.scss`, ad esempio `$primary`,
`$secondary` o `$font-family-sans-serif`. Il file viene importato prima di Bootstrap.
La palette del progetto include `primary` (`#0C2A3B`), `secondary` (`#29ADE8`)
e `tertiary` (`#F5B80A`). La mappa `$theme-colors` estende i colori standard di
Bootstrap, generando anche `bg-tertiary`, `text-tertiary` e `btn-tertiary`.
Le utility di opacita includono `opacity-10`. Non sono precaricati font personalizzati.
Poppins, Roboto e Swiper sono disponibili tra le dipendenze e possono essere
importati da `assets/src/js/main.js` quando servono.

Aggiungere i partial Sass condivisi in `assets/src/scss/main.scss` dopo Bootstrap.
Per CSS aggiuntivo usare `assets/src/css/main.css`.

## Icone Phosphor

Il pacchetto `@phosphor-icons/web` viene caricato da `assets/src/js/main.js`
con il solo stile `regular`. Le icone si possono usare nei template PHP:

```html
<i class="ph ph-phone fs-4 text-primary" aria-hidden="true"></i>
```

Le classi Bootstrap controllano dimensione e colore. Quando l'icona accompagna
un testo, usare `aria-hidden="true"`; per pulsanti con la sola icona, assegnare
un'etichetta accessibile al pulsante. Vite include CSS e font in `assets/dist/`.

## WordPress e SCF

- **Menu:** le posizioni `header` e `footer` sono registrate. Aggiungere il markup
  nei partial con `wp_nav_menu()` quando si sviluppa la navigazione.
- **Custom post type:** creare un file PHP in `cpt/` e includerlo da `functions.php`.
  News e' gia' registrato con editor a blocchi, immagine in evidenza e archivio
  `/news/`. Dopo aver aggiornato il tema, salvare **Impostazioni > Permalink**.
- **Blocchi SCF:** creare `templates/blocks/nome-blocco/register.php` e
  `templates/blocks/nome-blocco/nome-blocco.php`. Dopo il controllo
  `defined( 'ABSPATH' ) || exit;`, registrare il blocco con
  `cdc_register_block( 'nome-blocco', array( 'title' => 'Nome blocco' ) );`.
  I file di registrazione vengono caricati su `acf/init`. Gli asset `.js` e
  `.scss` direttamente nella cartella del blocco vengono raccolti da Vite.
- **Campi SCF:** creare i gruppi dal backend. I JSON sono salvati e caricati da
  `extensions/scf/json/`, che deve essere scrivibile da WordPress.
  La pagina **Impostazioni tema** e' disponibile quando SCF e' attivo.

Il tema funziona anche senza SCF. I contenuti eventualmente visibili provengono
dal database WordPress, che non fa parte di questa cartella.

## Distribuzione

Eseguire `npm run build` e caricare il tema includendo `assets/dist/`.
WordPress carica `assets/dist/css/main.css` e `assets/dist/js/main.js` sul sito
e nell'editor, con versione basata sulla data di modifica dei file.
Il bundle JavaScript usa il formato IIFE.

`node_modules/`, `.npm-cache/`, `.vscode/` e `assets/dist/` sono esclusi da Git.
Gli asset compilati sono comunque necessari sul server. `style.css` contiene
i metadati del tema. WordPress, database e plugin devono essere installati a parte.
