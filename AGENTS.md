# Direttive del progetto

## Prima di lavorare

- Esaminare la struttura della repository e i file coinvolti prima di scrivere codice.
- Mantenere le convenzioni del tema WordPress classico e le personalizzazioni esistenti.
- Scrivere file semplici, leggibili e facili da modificare.
- Evitare logiche superflue, conversioni di tipo preventive e regex quando bastano operazioni semplici.

## Design e Bootstrap

- Figma è un riferimento visivo: non serve riprodurre ogni misura al pixel.
- Preferire componenti, griglia e utility di Bootstrap al CSS personalizzato, dove possibile.
- Utilizzare le classi `fs-*` per la dimensione dei testi e `lh-*` per l'interlinea.
- Utilizzare le utility Bootstrap per spaziature, colori, allineamenti e bordi.
- Nelle media query Sass usare i mixin Bootstrap, ad esempio `media-breakpoint-up(lg)` e `media-breakpoint-down(sm)`.
- Usare i breakpoint configurati nel progetto, evitando soglie e larghezze arbitrarie derivate da Figma.
- Aggiungere Sass personalizzato solo dove le classi Bootstrap non bastano.
- Per le icone usare Phosphor Icons. Gli stili `regular` (`ph`) e `fill` (`ph-fill`) sono già caricati.
- Riutilizzare palette e font definiti in `assets/src/scss/abstracts/_variables.scss`.
- Verificare che menu e dropdown restino sopra i contenuti della pagina.

## Contenuti e SCF

- SCF è un requisito del tema e sarà sempre attivo: non aggiungere controlli `function_exists()` per le sue API.
- I contenuti modificabili devono arrivare dai campi SCF, senza testi, recapiti o collegamenti di ripiego hardcoded.
- Prima di implementare un nuovo blocco, indicare i campi SCF necessari con nome, tipo e formato di restituzione, se non sono già stati definiti.
- Usare i nomi dei campi concordati e rispettarne il formato di restituzione, senza gestire formati alternativi non richiesti.
- I gruppi di campi vengono creati e assegnati dal backend.
- I menu vengono gestiti da WordPress: usare `wp_nav_menu()` e le posizioni registrate, senza hardcodare le voci o i nomi dei menu.

## Blocchi personalizzati

Ogni blocco segue questa struttura:

```text
templates/blocks/nome-blocco/
    register.php
    nome-blocco.php
    nome-blocco.scss    # se necessario
    nome-blocco.js      # se necessario
```

- Registrare il blocco in `register.php` tramite `cdc_register_block()`.
- Cartella, slug e nome del template PHP devono corrispondere.
- I file di registrazione e gli asset dei blocchi vengono raccolti automaticamente: non aggiungere inclusioni manuali non necessarie.
- Seguire la struttura del tema di riferimento: ancora HTML, classi personalizzate e classe `is-admin` nell'anteprima.
- Mantenere la registrazione e gli helper del progetto attuale, senza importare dipendenze dagli helper del tema originale.
- Per `hero-slider` usare il Carousel nativo di Bootstrap e icone Phosphor.

## Anteprima nel backend

- Le anteprime dei blocchi devono occupare tutta la larghezza disponibile nell'editor.
- Devono essere statiche: link, pulsanti, slider e altre interazioni non devono attivarsi.
- Il blocco esterno deve restare selezionabile e modificabile.
- Il comportamento deve restare valido dopo il rendering iniziale e gli aggiornamenti dei campi SCF.
- Caricare il JavaScript del sito solo sul frontend; usare gli asset dedicati all'editor per la gestione delle anteprime.

## Compilazione e consegna

- Modificare i sorgenti; non intervenire direttamente sui file generati in `assets/dist/`.
- Dopo modifiche agli asset compilati eseguire `npm run build`.
- Gli asset dedicati all'editor in `assets/src/css/editor.css` e `assets/src/js/editor.js` sono caricati direttamente.
- Indicare quali file devono essere caricati sul server e se serve ricompilare gli asset.
- Riportare le verifiche effettivamente eseguite, distinguendo le anteprime locali dai controlli sul sito WordPress.

## Riferimenti

- Design Figma: https://www.figma.com/design/K9hemsFSEd2981M4ToB1ui/centro-duplicazioni-chiavi
- Frame Hero desktop: nodo `29:1413`.
- Tema di riferimento locale: `C:\Users\alessio\Downloads\twow-starter-theme-1.2.0\twow-starter-theme-1.2.0`.
