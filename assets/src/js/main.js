import '../scss/main.scss';
import '../css/main.css';
import 'bootstrap';
import '@phosphor-icons/web/regular';
import '@phosphor-icons/web/fill'

// Importare qui i componenti condivisi da ./components/.
// Font Poppins, Roboto e Swiper sono disponibili tra le dipendenze.

// Stili e interazioni dei futuri blocchi vengono raccolti automaticamente.
import.meta.glob('../../../templates/blocks/*/*.scss', { eager: true });
import.meta.glob('../../../templates/blocks/*/*.js', { eager: true });
