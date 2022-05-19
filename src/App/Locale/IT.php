<?php
use Cosmic\App\Config;

$GLOBALS['language'] = array (
    'website' => array (
        /*     App/View/base.html     */
        'base' => array(
            'nav_home'              => 'Home',

            'nav_community'         => 'Community',
            'nav_news'              => 'News',
            'nav_jobs'              => 'Bandi',
            'nav_photos'            => 'Galleria',
            'nav_rarevalue'         => 'Valore Rari',
            'nav_staff'             => 'Staff',
            'nav_team'              => 'Team',
            'nav_exchange'          => 'Mercato',

            'nav_shop'              => 'shop',
            'nav_buy_points'        => Config::site['shortname'] . ' Shop',
            'nav_buy_club'          => 'Acquista ' . Config::site['shortname'] . ' Club',
            'nav_purchasehistory'   => 'Cronologia Acquisti',
            'nav_changename'        => 'Cambia ' . Config::site['shortname'] . 'name',
            'nav_drawyourbadge'     => 'Crea il tuo Badge',
          
            'nav_highscores'        => 'Punteggi',

            'nav_forum'             => 'I miei gruppi',

            'nav_helptool'          => 'Aiuto',
            'nav_helptickets'       => 'Assistenza Tickets',

            'nav_housekeeping'      => 'Pannello Admin',

            'close'                 => 'Chiudi',
            'cookies'               => 'utilizza cookie propri e di terze parti per fornire un servizio migliore e garantisce inoltre che gli annunci pubblicitari corrispondano meglio alle tue preferenze. Se utilizzi il nostro sito web accetti la nostra cookie policy.',
            'read_more'             => 'LEGGI DI PIU',
            'thanks_for_playing'    => 'Grazie per giocare con noi!',
            'made_with_love'        => 'e fatto con molto amore!',
            'credits'               => 'Grazia a Raizer e Metus',
            'and_all'               => 'e conseguenti.',

            'login_name'            => 'Nickname',
            'login_password'        => 'Password',
            'login_save_data'       => 'Ricordami',
            'login_lost_password'   => 'Ho perso la Password!',

            'report_message'        => 'Reporta questo messaggio',
            'report_certainty'      => 'Stai per eseguire un report a questo messaggio, sicuro di continuare?',
            'report_inappropriate'  => 'Si, sono sicuro!',

            'user_to'               => 'Al',
            'user_profile'          => 'Il Mio Profilo',
            'user_settings'         => 'Impostazioni',
            'user_logout'           => 'Log out',

            'header_slogan'         => 'Un Mondo virtuale per giovani!',
            'header_slogan2'        => 'Entra a far parte della nostra community e fai nuove amicizie!',
            'header_login'          => 'Login',
            'header_register'       => 'Registrati a gratis!',
            'header_to'             => 'Al',

            'footer_helptool'       => 'ASSISTENZA',
            'footer_rules'          => 'Regolamento ' . Config::site['shortname'] . ' ',
            'footer_terms'          => 'Termini e Condizioni D\'uso',
            'footer_privacy'        => 'Dichiarazioni Privacy',
            'footer_cookies'        => 'Cookie Policy',
            'footer_guide'          => 'Guida Genitori'
        ),

        /*     public/assets/js/web     */
        'javascript' => array(
            'web_customforms_markedfields'                  => 'Tutti i campi con * SONO OBBLIGATORI!.',
            'web_customforms_loadingform'                   => 'Caricamento...',
            'web_customforms_next'                          => 'Avanti',
            'web_customforms_close'                         => 'Chiudi',
            'web_customforms_participation'                 => 'Grazie per la tua partecipazione!',
            'web_customforms_sent'                          => 'Risposta mandata, verra presa in considerazione e analizzata.',
            'web_customforms_answer'                        => 'Le tue risposte',

            'web_dialog_cancel'                             => 'Cancella',
            'web_dialog_validate'                           => 'Conferma',
            'web_dialog_confirm'                            => 'Conferma la tua scelta',

            'web_forum_first'                               => 'Iniziale',
            'web_forum_previous'                            => 'Precedente',
            'web_forum_last'                                => 'Ultimo',
            'web_forum_next'                                => 'Avanti',

            'web_hotel_backto'                              => 'Torna su ' . Config::site['shortname'] . ' Hotel',

            'web_fill_pincode'                              => 'Inserisci il codice PIN che hai specificato durante la creazione della sicurezza aggiuntiva sul tuo account. Se hai dimenticato il tuo PIN contattaci tramite il ' . Config::site['shortname'] . ' di Assistenza',
            'web_twostep'                                   => 'Doppio Fattore di Autenticazione',
            'web_login'                                     => 'Se non sei loggato non puoi eseguire questo Report!',
            'web_loggedout'                                 => 'Ti sei disconnesso :(',

            'web_notifications_success'                     => 'Successo!',
            'web_notifications_error'                       => 'Errore!',
            'web_notifications_info'                        => 'Informazione!',

            'web_page_article_login'                        => 'Devi essere loggato per postare un commento!',

            'web_page_community_photos_login'               => 'Devi essere loggato per mettere mi piace alle foto!',
            'web_page_community_photos_loggedout'           => 'Ti sei disconnesso :(',

            'web_page_forum_change'                         => 'Cambia',
            'web_page_forum_cancel'                         => 'Cancella',
            'web_page_forum_oops'                           => 'Oops...',
            'web_page_forum_topic_closed'                   => 'Questo topic e stato chiuso e non puoi rispondere.',
            'web_page_forum_login_toreact'                  => 'Per rispondere devi essere loggato!',
            'web_page_forum_login_tolike'                   => 'Devi essere loggato per mettere mi piace a questo Post!',
            'web_page_forum_loggedout'                      => 'Ti sei disconnesso :(',

            'web_page_profile_login'                        => 'Devi essere loggato per mettere mi piace alle foto!',
            'web_page_profile_loggedout'                    => 'Ti sei disconnesso :(',

            'web_page_settings_namechange_request'          => 'Richiesta',
            'web_page_settings_namechange_not_available'    => 'Non disponibile :(',
            'web_page_settings_namechange_choose_name'      => 'Scegli ' . Config::site['shortname'] . 'name',

            'web_page_settings_verification_oops'           => 'Oops...',
            'web_page_settings_verification_fill_password'  => 'Inserisci la tua Password!',
            'web_page_settings_verification_2fa_on'         => 'L\'autenticazione di Google e attualmente impostata sul tuo account. Per utilizzare un altro metodo di verifica, devi prima rimuovere la tua vecchia verifica!',
            'web_page_settings_verification_2fa_secretkey'  => 'Hai scansionato il codice QR sul tuo telefono? Quindi inserisci la chiave segreta per confermare il tuo account!',
            'web_page_settings_verification_2fa_authcode'   => 'Codice di Autenticazione',
            'web_page_settings_verification_pincode_on'     => 'Al momento hai un codice pin impostato sul tuo account. Per utilizzare un altro metodo di verifica devi prima rimuovere la tua vecchia verifica!',
            'web_page_settings_verification_2fa_off'        => 'Per disabilitare l\'autenticazione di Google ti chiediamo di inserire il codice segreto dal generatore.',
            'web_page_settings_verification_pincode_off'    => 'Per disabilitare l\'autenticazione del codice PIN ti chiediamo di inserire il tuo codice PIN.',
            'web_page_settings_verification_pincode'        => 'Codice PIN',
            'web_page_settings_verification_switch'         => 'Clicca sul pulsante di lato per abilitare un metodo di autenticazione!',

            'web_page_shop_offers_neosurf_name'             => 'Neosurf',
            'web_page_shop_offers_neosurf_description'      => 'Paga velocmente con PayPal e in\'automatico riceverai i tuoi GOTW-Points.',
            'web_page_shop_offers_neosurf_dialog'           => 'Inserisci la EMAIL del tuo account PayPal per continuare.',
            'web_page_shop_offers_paypal_name'              => 'Paypal',
            'web_page_shop_offers_paypal_description'       => 'Paga velocmente con PayPal e in\'automatico riceverai i tuoi GOTW-Points.',
            'web_page_shop_offers_paypal_dialog'            => 'Inserisci la EMAIL del tuo account PayPal per continuare.',
            'web_page_shop_offers_sms_name'                 => 'SMS',
            'web_page_shop_offers_sms_description'          => 'Invia un codice SMS e ricevi i tuoi codici GOTW-Points.',
            'web_page_shop_offers_sms_dialog'               => 'Invia un codice SMS qui sotto per ricevere il tuo codice GOTW-Points.',
            'web_page_shop_offers_audiotel_name'            => 'Audiotel',
            'web_page_shop_offers_audiotel_description'     => 'Chiama il numero una o piu volte per ricevere i tuoi codici GOTW-Points.',
            'web_page_shop_offers_audiotel_dialog'          => 'Chiama il numero qui sotto per ricevere il tuo codice GOTW-Points.',
            'web_page_shop_offers_pay_with'                 => 'Paga con',
            'web_page_shop_offers_points_for'               => 'GOTW-Points per',
            'web_page_shop_offers_get_code'                 => 'Acquista codici GOTW-Points',
            'web_page_shop_offers_fill_code'                => 'Inserisci il tuo codice GOTW-Points',
            'web_page_shop_offers_fill_code_desc'           => 'Inserisci il tuo codice qui sotto GOTW-Points per ricevere i tuoi GOTW-Points.',
            'web_page_shop_offers_submit'                   => 'INVIA',
            'web_page_shop_offers_success'                  => 'Acquisto Completato!',
            'web_page_shop_offers_received'                 => 'Grazie per il tuo acquisto, hai ricevuto:',
            'web_page_shop_offers_received2'                => 'GOTW-Points.',
            'web_page_shop_offers_close'                    => 'Chiudi',
            'web_page_shop_offers_failed'                   => 'ACQUISTO FALLITO!',
            'web_page_shop_offers_failed_desc'              => 'Acquisto Fallito, riprova o contattaci attraverso l\'assistenza',
            'web_page_shop_offers_back'                     => 'Indietro',
            'web_page_shop_offers_no_card'                  => 'Se non hai una carta prepagata Neosurf, puoi guardare anche',
            'web_page_shop_offers_no_card2'                 => 'Punti Vendita',
            'web_page_shop_offers_to'                       => 'Al',
            'web_page_shop_offers_buy_code'                 => 'Acquista il codice di accesso',
            'web_page_hotel_loading'                        => 'sta caricando....',
            'web_page_hotel_sometinhg_wrong_1'              => 'Oops, qualcosa e andato storto!.',
            'web_page_hotel_sometinhg_wrong_2'              => 'Ricarica la pagina',
            'web_page_hotel_sometinhg_wrong_3'              => 'O crea un ticket nell\'assistenza!',
            'web_page_hotel_welcome_at'                     => 'Benvenuto su',
            'web_page_hotel_soon'                           => 'Fatti un drink, arriviamo subito!',
            'web_hotel_active_flash_1'                      => 'Sei gia su ' . Config::site['shortname'] .'!',
            'web_hotel_active_flash_2'                      => 'Clicca Qui',
            'web_hotel_active_flash_3'                      => 'e fai clic sul lato sinistro su "consenti" flash, per abilitare il flash.',
            
        ),

        /*     App/View/Community     */
        'article' => array (
            'reactions'                 => 'Commenti',
            'reactions_empty'           => 'CI SONO ANCORA 0 COMMENTI.',
            'reactions_fill'            => 'Inserisci qui il tuo messaggio',
            'reactions_post'            => 'Post',
            'latest_news'               => 'Ultime News',
            'reaction_hidden_yes'       => 'I commenti delle News sono invisibili!',
            'reaction_hidden_no'        => 'I commenti delle News sono visibili!',
            'forbidden_words'           => 'Il tuo messaggio contiene parole inadatte!',
        ),
        'forum' => array (
          /*  Forum/index.html  */
            'index_subject'             => 'Oggetto',
            'index_topics'              => 'Topics',
            'index_latest_topic'        => 'Ultimo topic',
            'index_empty'               => 'No topics',
            'index_latest_activities'   => 'Ultime attivita',
            'index_by'                  => 'da',

          /*  Forum/category.html  */
            'category_new_topic'        => 'Nuovo topic',
            'category_back'             => 'Indietro',
            'category_topics'           => 'Topics',
            'category_posts'            => 'Posts',
            'category_latest_reacts'    => 'Ultime reazioni',
            'category_topic_by'         => 'Da',
            'category_no_reacts'        => 'Nessuna reazione',
            'category_latest_react_by'  => 'Ultima reazione da',
            'category_create_topic'     => 'Crea nuovo topic',
            'category_subject'          => 'Oggetto',
            'category_description'      => 'Descrizione',
            'category_create_button'    => 'Crea topic',
            'category_or'               => 'o',
            'category_cancel'           => 'cancella',

          /*  Forum/topic.html  */
            'topic_react'               => 'Reagisci',
            'topic_close'               => 'Chiudi',
            'topic_reopen'              => 'Riapri',
            'topic_since'               => 'Dal:',
            'topic_posts'               => 'Posts:',
            'topic_topic'               => 'Topic:',
            'topic_reaction'            => 'Reazione:',
            'topic_closed'              => 'ATTENZIONE! Questo topic e chiuso, se non sei d\'accordo puoi lamentarti all\'',
            'topic_helptool'            => 'Assistenza',
            'topic_and'                 => 'e',
            'topic_likes_1'             => 'altri hanno messo like!',
            'topic_likes_2'             => 'likes!',
            'topic_likes_3'             => 'likes!'
        ),

        /*     App/View/Community     */
        'community_photos' => array (
            'by'          => 'da',
            'photos_by'   => 'Foto\'s da',
            'photos_desc' => 'Guarda le ultime foto scattate da',
            'load_more'   => 'Alte Foto'
        ),
		'community_rares' => array (
		'desc'        => ' Furni di valore piu alto',
		'last_clickhere' => 'Clicca Qui!',
		'last_edited'   => 'Ultima Modifica: ',
		'last_editor'   => 'Ultimo Editor: ',
		'last_rares'   => 'Ultimi 10 rari pubblicati',
		'none_rare_found_desc'   => 'Forse stai cercando',
		'none_rare_found_last'   => 'Ultimi 10 Rari',
		'none_rare_found_title'   => 'Non ci sono rari in questa pagina',
		'pages_notfound'   => 'Pagina non disponibile!',
        'rares_pages'   => 'Pagine',
		'search'   => 'Cerca',
		'title'       => Config::site['shortname'] . ' Rari',
        'units'   => 'Quantita'
            
			
        ),
        'community_staff' => array (
            'title'       => 'Come posso diventare un membro dello Staff su ' . Config::site['shortname'] . ' ?',
            'desc'        => 'Il nostro staff e qui per aiutarti e guidarti all\'interno di questo hotel!',
            'content_1'   => 'Ovviamente tutti sognano di essere membri dell\' ' . Config::site['shortname'] . ' , ma purtroppo non vale per tutti. Per diventare un membro dello staff su ' . Config::site['shortname'] . '  devi compilare il nostro Form.',
            'content_2'   => 'Purtroppo questi Form non sono sempre aperti, vi aggiorneremo attraverso le News in caso di nuovi reclutamenti.'
        ),
        'community_value' => array (
            'title_header'      => 'Catalogo Mercato',
            'decs_header'       => 'Tutti i furni esclusivi con un valore superiore ai \'CREDITI\' che puoi comprare qui!',
            'furni_name'        => 'Nome',
            'furni_type'        => 'Tipo',
            'furni_costs'       => 'Prezzo',
            'furni_amount'      => 'In hotel',
            'furni_value'       => 'Vecchio prezzo',
            'furni_rate'        => 'Valore',
            'looking_for'       => 'Sto cercando...',
            'seller'            => 'Venditore',
            'price'             => 'Prezzo',
            'nav_my'            => 'Il mio mercato',
            'nav_shop'          => 'Mercato',
            'nav_catalogue'     => 'Catalogo',
            'marketplace_desc'  => 'I venditori di ' . Config::site['shortname'] . ' hotel offrono qui le loro cose che puoi pagare con le tue valute. Forse qui troverai articoli esclusivi che normalmente non puoi acquistare nel nostro catalogo!'
        ),
        /*     App/View/Games     */
        'games_ranking' => array (
            'username' => 'Nickname'
        ),

        /*     App/View/Help     */
        'help' => array (
          /*  Help/help.html  */
            'help_title'                => 'FAQ',
            'help_label'                => 'Trova tutte le risposte alle tue domande qui!',
            'help_other_questions'      => 'Altre Domande',
            'help_content_1'            => 'Non hai trovato risposta alle tue domande? Apri un ticket e chiedi pure all\'assistenza.',
            'help_contact'              => 'Contatti',
            'title'                     => 'Assistenza',
            'desc'                      => 'Qui puoi cercare risposte alle tue domande, se non le trovi contatta pure l\'assistenza.',

          /*  Help/request.html  */
            'request_closed'            => 'CHIUSO',
            'request_on'                => 'Il:',
            'request_ticket_amount'     => 'Numero di Tickets:',
            'request_react_on'          => 'Reagito il:',
            'request_react'             => 'Reagisci',
            'request_description'       => 'Descrizione',
            'request_react_on_ticket'   => 'Reagisci al Ticket',
            'request_contact'           => 'Contatta ' . Config::site['shortname'],
            'request_contact_help'      => 'Puoi contattarci aprendo un Ticket.',
            'request_new_ticket'        => 'APRI TICKET',
            'request_subject'           => 'Oggetto',
            'request_type'              => 'Tipo',
            'request_status'            => 'Ticket aperto',
            'request_in_treatment'      => 'In supervisione',
            'request_open'              => 'Aperto',
            'request_closed'            => 'Chiuso'
        ),
        'help_new' => array (
            'title'         => 'I miei ticket',
            'subject'       => 'Oggetto',
            'description'   => 'Descrizione',
            'open_ticket'   => 'Apri ticket'
        ),

        /*     App/View/Home     */
        'home' => array (
            'to'                      => 'A',
            'friends_online'          => 'Amici online',
            'now_in'                  => 'Ora in',
            'latest_news'             => 'Ultime News',
            'latest_facts'            => 'Ultimi fatti di ' . Config::site['shortname'] . '!',
            'popular_rooms'           => 'Stanze popolari',
            'popular_rooms_label'     => 'Scopri quale stanze sono piu di tendenza su '. Config::site['shortname'] . '!',
            'popular_no_rooms'        => 'Attualmente nessuno e collegato in Hotel!!',
            'goto_room'               => 'Entra',
            'popular_groups'          => 'Gruppi Popolari',
            'popular_groups_label'    => 'A chi vuoi unirti?',
            'popular_no_groups'       => 'Nessun gruppo e stato creato!',
            'load_news'               => 'ALTRE NEWS',
            'user_of_the_week'        =>  Config::site['shortname'] . ' della settimana',
            'user_of_the_week_label'  => 'Utente della settimana'
        ),
        'lost' => array (
            'page_not_found'          => 'PAGINA NON TROVATA!',
            'page_content_1'          => 'Mi spiace ma la pagina che hai cercato non esiste.',
            'page_content_2'          => 'Controlla di aver inserito il giusto URL. In tal caso clicca sul bottone \'INDIETRO\' per tornare alle schermate principali.',
            'sidebar_title'           => 'Forse stai cercando...',
            'sidebar_stats'           => 'La casa di un tuo amico?',
            'sidebar_stats_label_1'   => 'Forse e su',
            'sidebar_stats_label_2'   => 'Punteggi',
            'sidebar_rooms'           => 'Stanze Popolari?',
            'sidebar_rooms_label_1'   => 'Sfoglia i',
            'sidebar_rooms_label_2'   => 'Navigatore',
            'sidebar_else'            => 'Ho perso i miei calzini!',
            'sidebar_else_label'      => 'In tal caso devi cercare meglio :-)'
        ),
        'profile' => array (
            'overlay_search'        => 'Chi stai cercando?',
            'since'                 => 'dal',
            'currently'             => 'Attualmente',
            'never_online'          => 'Non online',
            'last_visit'            => 'Ultima visita',
            'guestbook_title'       => 'Libro degli ospiti',
            'guestbook_label'       => 'Vuoi scrivere qualcosa?',
            'guestbook_input'       => 'Che cosa stai facendo,',
            'guestbook_input_1'     => 'Che cosa vuoi',
            'guestbook_input_2'     => 'sapere?',
            'guestbook_load_more'   => 'Carica altri messaggi',
            'badges_title'          => 'Distintivi',
            'badges_label'          => 'Distintivi casuali che posso indossare',
            'badges_empty'          => 'Non ha ancora nessun Distintivo',
            'friends_title'         => 'Amici',
            'friends_label'         => 'Lista amici casuale',
            'friends_empty'         => 'Non ha ancora nessun amico',
            'groups_title'          => 'Gruppi',
            'groups_label'          => 'Guarda cosa amo!',
            'groups_empty'          => 'Non fa parte di nessun gruppo',
            'rooms_title'           => 'Stanze',
            'rooms_label'           => 'Ultime stanze create',
            'rooms_empty'           => 'Non ha creato ancora nessuna stanza',
            'photos_title'          => 'Foto',
            'photos_label'          => 'Vuoi fare una foto con me?',
            'photos_empty'          => 'Non ha ancora scattato nessuna foto',
            'title'                 => 'Profilo'
        ),
        'registration' => array (
            'title'                 => 'Inserisci i tuoi dati correttamente',
            'email'                 => 'Indirizzo E-mail',
            'email_fill'            => 'Inserisci qui il tuo indirizzo E-mail',
            'email_help'            => 'Avremo bisogno di queste informazioni per ripristinare il tuo account nel caso in cui perdessi l\'accesso.',
            'password'              => 'Password',
            'password_fill'         => 'Password...',
            'password_repeat'       => 'Ripeti password',
            'password_repeat_fill'  => 'Ripeti password...',
            'password_help_1'       => 'La tua password deve essere lunga almeno 6 caratteri e contenere lettere e numeri.',
            'password_help_2'       => 'Assicurati che la tua password sia diversa da quella di altri siti web!',
            'birthdate'             => 'Data di Nascita',
            'day'                   => 'Giorno',
            'month'                 => 'Mese',
            'year'                  => 'Anno',
            'birthdate_help'        => 'Avremo bisogno di queste informazioni per ripristinare il tuo account nel caso in cui perdessi l\'accesso.',
            'found'                 => 'Come hai conosciuto ' . Config::site['shortname'] . ' Hotel?',
            'found_choose'          => 'Fai una scelta',
            'found_choose_1'        => 'Google',
            'found_choose_2'        => 'Attraverso amici',
            'found_choose_3'        => 'Attraverso altri giochi',
            'found_choose_4'        => 'Via facebook',
            'found_choose_5'        => 'Altro',
            'create_user'           => 'Crea il tuo ' . Config::site['shortname'] . '!',
            'username'              =>  Config::site['shortname'] . 'name',
            'username_fill'         =>  Config::site['shortname'] . 'name...',
            'username_help'         => 'Il tuo Nickname su ' . Config::site['shortname'] . ' Hotel.',
            'sex'                   => 'Sesso',
            'male'                  => 'Maschio',
            'female'                => 'Femmina',
            'register'              => 'Registrazione',
            'header_slogan2'        => 'Unisciti alla nostra community e fai nuove amicizie'
        ),

        /*     App/View/Jobs     */
        'apply' => array (
            'title'               => 'Rispondi al form',
            'content_1'           => 'Grazie per il tuo interesse su ' . Config::site['shortname'] . ' Hotel e per aver risposto al form.',
            'content_2'           => 'Cerca di compilare il questionario il piu dettagliato e accurato possibile.',
            'description'         => 'Descrizione del lavoro',
            'question_name'       => 'Qual\'e il tuo Nickname?',
            'question_age'        => 'Quanti anni hai?',
            'question_why'        => 'Perche pensi di poter essere adatto?',
            'question_time'       => 'Quante ore passi Online?',
            'question_time_help'  => 'Dicci quante ore trascorri online al giorno su' . Config::site['shortname'] . ' Hotel.',
            'monday'              => 'Lunedi',
            'tuesday'             => 'Martedi',
            'wednesday'           => 'Mercoledi',
            'thursday'            => 'Giovedi',
            'friday'              => 'Venerdi',
            'saturday'            => 'Sabato',
            'sunday'              => 'Domenica',
            'time_to_time'        => 'da X a Y ore',
            'send'                => 'Invia Richiesta'
        ),
        'jobs' => array (
            'title'                   => 'Lista candidature aperte',
            'applications'            => 'Le mie richieste',
            'available_applications'  => 'Candidature Disponibili',
            'buildteam'               => 'Buildteam',
            'buildteam_desc'          => 'Sono responsabili della costruzione delle stanze (per eventi/ufficiali).',
            'react'                   => 'Rispondi'
        ),

        /*     App/View/Password     */
        'password_claim' => array (
            'title'                 => 'Password Dimenticata?',
            'content_1'             => 'Inserisci il tuo ' . Config::site['shortname'] . 'nickname ed indirizzo e-mail qui sotto e ti invieremo un link di reset per la password.',
            'content_2'             => 'Nessuno ha il diritto di richiedervi un reset della password, neanche lo Staff!',
            'username'              =>  Config::site['shortname'] . 'Nickname',
            'email'                 => 'Indirizzo E-mail',
            'send'                  => 'Invia e-mail',
            'wrong_page'            => 'Falso Allarme!',
            'wrong_page_content_1'  => 'Se ricordi la tua password e sei finito qui per sbaglio, clicca qui sotto per tornare alla home.',
            'back_to_home'          => 'Torna alla Home'
        ),
        'password_reset' => array (
            'title'                     => 'Cambio Password',
            'new_password'              => 'Nuova Password',
            'new_password_fill'         => 'Inserisci la tua password...',
            'new_password_repeat_fill'  => 'Conferma la tua password...',
            'change_password'           => 'Cambia Password'
        ),

        /*     App/View/Settings     */
        'settings_panel' => array (
            'preferences'    => 'Le mie impostazioni',
            'password'       => 'Cambia Password',
            'verification'   => 'Imposta una verifica',
            'email'          => 'Cambia indirizzo e-mail',
            'namechange'     => 'Cambia ' . Config::site['shortname'] . 'nickname',
            'shop_history'   => 'Cronologia Acquisti'
        ),
        'settings_email' => array (
            'title'           => 'Cambia e-mail',
            'email_title'     => 'Indirizzo E-mail',
            'email_label'     => 'Il tuo indirizzo e-mail e necessario per ripristinare il tuo account in caso di perdita dell\'accesso.',
            'password_title'  => 'Password attuale',
            'fill_password'   => 'Inserisci la tua password...',
            'save'            => 'Salva'
        ),
        'settings_namechange' => array (
            'title'           => 'Cambia ' . Config::site['shortname'] . 'Nickname',
            'help_1'          => 'Vuoi cambiare il tuo ' . Config::site['shortname'] . 'nickname? Sappi che costa',
            'help_2'          => 'e verra addebitato immediatamente dopo la tua richiesta. Una volta che il tuo nome e stato cambiato, non possiamo annullarlo! Quindi assicurati di riflettere attentamente sulla tua decisione!',
            'fill_username'   =>  Config::site['shortname'] . 'nickname...',
            'request'         => 'Conferma richiesta'
        ),
        'settings_password' => array (
            'title'                     => 'Cambia Passowrd',
            'password_title'            => 'Password attuale',
            'fill_password'             => 'Inserisci la tua attuale password...',
            'newpassword_title'         => 'Nuova password',
            'fill_newpassword'          => 'Inserisci la tua nuova password...',
            'fill_newpassword_repeat'   => 'Conferma nuova password...',
            'help'                      => 'La tua password deve essere lunga almeno 6 caratteri e contenere lettere e numeri.',
            'save'                      => 'Salva'
        ),
        'settings_preferences' => array (
            'title'               => 'Le mie impostazioni',
            'follow_title'        => 'Funzioni Segui - chi ti puo seguire?' ,
            'follow_label'        => 'Non voglio che nessun ' . Config::site['shortname'] . 'mi segua',
            'friends_title'       => 'Richieste amicizie',
            'friends_label'       => 'Abilitare richieste amicizie?',
            'room_title'          => 'Inviti stanza',
            'room_label'          => 'Non voglio essere invitato in nessuna stanza',
            'hotelalerts_title'   => 'Avvisi Hotel',
            'hotelalerts_label'   => 'Non voglio ricevere avvisi in Hotel',
            'chat_title'          => 'Impostazioni Chat',
            'chat_label'          => 'Preferisco usare la vecchia chat'
        ),
        'settings_verification' => array (
            'title'                 => 'Sicurezza Account',
            'help'                  => 'Questo controllo aumenta la sicurezza del tuo account. Quando accedi, devi, a seconda delle tue preferenze, rispondere alle domande di sicurezza che hai definito o inserire un codice generato dalla tua applicazione.',
            'password_title'        => 'Inserisci la tua password',
            'auth_title'            => 'Doppio fattore di Autenticazione',
            'auth_label'            => 'Rendi piu sicuro il tuo account con un doppio fattore di autenticazione',
            'method_title'          => 'Metodo di verifica',
            'method_choose'         => 'Seleziona una metodo di verifica...',
            'method_pincode'        => 'Codice PIN',
            'method_auth_app'       => 'Google 2FA',
            'pincode_title'         => 'Codice PIN',
            'pincode_label'         => 'Metti un codice PIN sul tuo account come ulteriore sicurezza, con questo garantisci una migliore protezione del tuo account contro gli hacker.',
            'fill_pincode'          => 'Inserisci il tuo codice PIN',
            'generate_auth'         => 'Generazione del codice da parte di 2FA',
            'generate_auth_label'   => 'Questa e la sicurezza piu consigliata, Lika il tuo ' . Config::site['shortname'] . ' account a un\'applicazione di autenticazione (Google Authenticator) sul telefono. Quando farai il login, non devi fare altro che inserire il codice generato dalla tua app.',
            'link_account'          => 'Collega il tuo account',
            'link_account_label'    => 'Per collegare il tuo account, scansiona semplicemente questo codice QR con la tua applicazione e quindi fai clic su Salva per convalidare questa modifica.',
            'save'                  => 'Salva'
        ),

        /*     App/View/Shop     */
        'shop_club' => array (
            'club_benefits'       => 'Benefici Club',
            'club_buy'            => 'Acquista ' . Config::site['shortname'] . ' Club',
            'unlimited'           => 'ILLIMITATO',
            'more_information'    => 'Maggiori Informazioni',
            'content_1'           => 'Hai una domanda o un problema con l\'acquisto?',
            'content_2'           => 'Contatta subito l\'assistenza attraverso il nostro',
            'help_tool'           =>  Config::site['shortname'] . ' Help Tool',
            'random_club_users'   => 'Membro Club ' . Config::site['shortname'] . ' casuale',
            'desc'                => 'Qui potrai comprare il tuo ' . Config::site['shortname'] . ' club per soldi REALI. Con il club puoi acquistare oggetti esclusivi.'
        ),
        'shop_history' => array (
            'buy_history'         => 'Cronologia Acquisti',
            'product'             => 'Prodotti',
            'date'                => 'Data',
            'buy_history_empty'   => 'La tua cronologia e vuota, non hai ancora eseguito acquisti.',
            'buy_club'            => 'Acquista ' . Config::site['shortname'] . ' Club',
            'content_1'           => 'Hai una domanda o un problema con l\'acquisto?',
            'content_2'           => 'Contatta subito l\'assistenza attraverso il nostro',
            'help_tool'           =>  Config::site['shortname'] . ' Help Tool',
            'title'               => 'Cronologia Acquisti',
            'desc'                => 'Qui potrai vedere tutti gli acquisti che hai fatto',
            'title_draw'          => 'Crea il tuo distintivo',
            'draw_desc'           => 'Crea il tuo distintivo personale per diamanti'
        ),
        'shop_offers' => array (
            'back'              => 'Indietro',
            'buymethods'        => 'Modalita di pagamento',
            'for'               => 'per',
            'or_lower'          => 'o inferiore',
            'loading_methods'   => 'Caricamento dei metodi di pagamento in corso...',
            'store'             => 'Negozio'
        ),
        'shop' => array (
            'title'             => 'Seleziona un prodotto',
            'country'           => 'Paese:',
            'netherlands'       => 'Olanda',
            'belgium'           => 'Beglio',
            'super_rare'        => 'Super rari',
            'more_information'  => 'Maggiori Informazioni',
            'content_1'         => 'Hai una domanda o un problema con l\'acquisto?',
            'content_2'         => 'Contatta subito l\'assistenza attraverso il nostro',
            'help_tool'         =>  Config::site['shortname'] . ' Help Tool',
            'not_logged'        => 'Oops! Non sei loggato!',
            'have_to_login'     => 'Devi essere loggato per visualizzare ' . Config::site['shortname'] . ' Shop.',
            'click_here'        => 'Clicca qui',
            'to_login'          => 'per eseguire il login.',
            'store'             => 'Negozio',
            'desc'              => 'Qui puoi acquistare crediti con soldi veri, con questo puoi acquistare articoli esclusivi nel nostro catalogo',
            'get'               => 'Guadagni'
        ),
        'games_ranking' => array(
            'title'             => 'Punteggi',
            'desc'              => 'Qui puoi trovare i punteggi di tutti i giocatori'
        )
    ),
    'core' => array (
        'belcredits' => 'GOTW-Points',
        'hotelapi' => array (
            'disabled' => 'Impossibile elaborare la richiesta perche l\'hotelapi e spento!'
        ),
        'dialog' => array (
            'logged_in'             => 'Oops per visitare questa paggina devi essere loggato!',
            'not_logged_in'         => 'Non devi essere loggato per visualizzare questa pagina!'
        ),
        'notification' => array (
            'message_placed'        => 'Il tuo messaggio e stato postato!',
            'message_deleted'       => 'Il tuo messaggio e stato cancellato!',
            'invisible'             => 'Questo e stato reso invisibile!',
            'profile_invisible'     => 'Questo ' . Config::site['shortname'] . ' ha reso il suo profilo privato!',
            'profile_notfound'      => 'Mi spiace.. non troviamo nessun profilo di riscontro con ' . Config::site['shortname'] . '!',
            'no_permissions'        => 'Non hai i permessi',
            'already_liked'         => 'Hai gia messo like!',
            'liked'                 => 'Hai messo like!',
            'banned_1'              => 'Sei stato bannato per la violazione del regolamento di ' . Config::site['shortname'] . ':',
            'banned_2'              => 'Il tuo ban scade:',
            'something_wrong'       => 'Qualcosa e andato storto, ritenta!.',
            'room_not_exists'       => 'Questa stanza non esiste!',
            'staff_received'        => 'Grazie! L\' ' . Config::site['shortname'] . ' Staff lo ha preso in mano!',
            'not_enough_belcredits' => 'Non hai abbastanza gotwpoints.',
            'not_enough_points'     => 'Non hai abbastanza points.',
            'topic_closed'          => 'Non puoi rispondere a un topic chiuso!',
            'post_not_allowed'      => 'Non hai gli accessi per creare post in questo Forum!',
            'draw_badge_uploaded'   => 'Il tuo distintivo e stato mandato allo staff per la supervisione, una volta accettato lo avrai nell\'inventario!'
        ),
        'pattern' => array (
            'can_be'                => 'al massimo',
            'must_be'               => 'deve essere minimo',
            'characters_long'       => 'caratteri.',
            'invalid'               => 'non soddisfa i requisiti!',
            'invalid_characters'    => 'contiene caratteri non validi!',
            'is_required'           => 'Compila tutti i campi richiesti!',
            'not_same'              => 'non combacia',
            'captcha'               => 'Recatpa Errato!',
            'numeric'               => 'deve essere numerico!',
            'email'                 => 'non e valida!'
        ),
        'title' => array (
            'home'              => 'Fai amicizia, gioca, crea stanze e distinguiti!',
            'lost'              => 'Pagina non trovata!',
            'registration'      => 'Registrati Gratuitamente!',
            'hotel'             => 'Hotel',

            'password' => array (
                'claim'    => 'Password Dimenticata?',
                'reset'    => 'Cambia Password',
            ),
            'settings' => array (
                'index'         => 'Le mie impostazioni',
                'password'      => 'Cambia Password',
                'email'         => 'Cambia e-mail',
                'namechange'    => 'Cambia ' . Config::site['shortname'] . 'nickname'
            ),
            'community' => array (
                'index'     => 'Community',
                'photos'    => 'Galleria',
                'staff'     =>  Config::site['shortname'] . ' Staff',
                'team'      =>  Config::site['shortname'] . ' Team',
                'fansites'  => 'Fansites',
                'value'     => 'Catalogo Mercato',
                'forum'     => 'I miei gruppi'
            ),
            'games' => array (
                'ranking'   => 'Punteggi'
            ),
            'shop' => array (
                'index'     => 'Negozio' . Config::site['shortname'] . ,
                'history'   => 'Cronologia acquisti',
                'club'      =>  Config::site['shortname'] . ' Club'
            ),
            'help' => array (
                'index'     => 'AIUTO',
                'requests'  => 'ASSISTENZA',
                'new'       => 'Apri Ticket'
            ),
            'jobs' => array (
                'index'     =>  'Bandi' . Config::site['shortname'] . ,
                'apply'     => 'Rispondi al bando'
            )
        )
    ),
    'asn' => array(
        'login'                     => 'Logins attraverso le VPN non sono autorizzate!',
        'registerd'                 => 'Non puoi registrarti attraverso una VPN non autorizzata!'
    ),
    'login' => array (
        'invalid_password'          => 'Password invalida.',
        'invalid_pincode'           => 'Questo codice pin non corrisponde a quello inserito ' . Config::site['shortname'] . '!',
        'fill_in_pincode'           => 'Inserisci ora il tuo codice PIN per accedere al tuo account!'
    ),
    'register' => array (
        'username_invalid'          =>  Config::site['shortname'] . 'nikcname non consono al nostro regolamento ' . Config::site['shortname'] . ,
        'username_exists'           =>  Config::site['shortname'] . 'questo nickname e gia in uso :-(',
        'email_exists'              => 'Questa e-mail e gia in uso :-(',
        'too_many_accounts'         => 'Ci sono troppi account registrati con questo ip :-('
    ),
    'claim' => array (
        'invalid_email'             => 'Questa e-mail non corrisponde a quella inserita su ' . Config::site['shortname'] . ' ID.',
        'invalid_link'              => 'Il link e scaduto, richiedi di nuovo la password per cambiarla.',
        'send_link'                 => 'Ti abbiamo appena mandato una e-mail! Arrivao NULLA? Prova a guardare nella SPAM.',
        'password_changed'          => 'La tua password e stata cambiata, devi rieseguire il Login!',

        'email'  => array (
            'title'                 => 'Cambia la tua password.'
        )
    ),
    'settings' => array (
        'email_saved'               => 'Il tuo indirizzo e-mail e stato cambiato.',
        'pincode_saved'             => 'Il tuo codice pin e stato salvato, devi rieseguire il login. A Presto! :)',
        'password_saved'            => 'La tua password e cambiata. devi rieseguire il Login. A Presto! :)',
        'preferences_saved'         => 'Le tue impostazioni sono state cambiate!',
        'current_password_invalid'  => 'L\'attuale password inserita non corrisponde a quella inserita su ' . Config::site['shortname'] . ' ID.',
        'choose_new_username'       => 'Inserisci un nuovo ' . Config::site['shortname'] . 'nickname.',
        'choose_new_pincode'        => 'Inserisci un nuovo codice PIN.',
        'user_is_active'            => 'Questo ' . Config::site['shortname'] . ' potrebbe essere ancora attivo!',
        'user_not_exists'           => 'Questo ' . Config::site['shortname'] . 'nickname non esiste e puo essere preso!',
        'invalid_secretcode'        => 'Il codice segreto di autenticazione di Google non e corretto.',
        'enabled_secretcode'        => 'Metodo di autenticazione impostato! Dovrai effettuare nuovamente il login... A Presto!',
        'disabled_secretcode'       => 'Metodo di autenticazione disabilitato!'
    ),
    'rcon' => array (
        'exception'                 => 'Non e possibile procedere con l\'RCON perche l\'emulatore e spento.'
    ),
    'shop' => array (
        'offers' => array (
            'invalid_transaction'   => 'Impossibile elaborare la transazione!',
            'invalid_code'          => 'Il codice che hai inserito non e corretto.',
            'success_1'             => 'Grazie per il tuo acquisto! Hai ricevuto',
            'success_2'             => 'gotw-points.'
        ),
        'club' => array (
            'already_vip'           => 'Sei un membro full life del ' . Config::site['shortname'] . ' Club.',
            'purchase_success'      => 'Grande! Ora sei un membro del ' . Config::site['shortname'] . ' Club per 31 giorni.'

        ),
        'marketplace' => array(
            'expired'               => 'L\'articolo e scaduto, non e possibile acquistare questo articolo!',
            'purchased'             => 'L\'oggetto e stato acquistato con successo e ora viene aggiunto al tuo inventario',
            'regards'               => 'Il tuo articolo e arrivato! Saluti da' . Config::site['shortname']
        ),
    ),
    'help' => array (
        'ticket_created'            => 'Il tuo ticket di assistenza e stato creato. Visualizza i tuoi ticket per visualizzare la richiesta di aiuto.',
        'ticket_received'           => 'Un ' . Config::site['shortname'] . ' Staff ha risposto al tuo ticket dello strumento di assistenza. Visita lo strumento di aiuto per visualizzare la risposta.',
        'already_open'              => 'Hai ancora un ticket aperto! Quando questo verra chiuso, puoi creare nuovamente un ticket.',
        'no_answer_yet'             => 'Potrai rispondere al tuo ticket mandato all\' ' . Config::site['shortname'] . ' Staff, quando verra inviata una risposta dallo Staff.',
    ),
    'forum' => array (
        'is_sticky'                 => 'Sticky aggiornato!',
        'is_closed'                 => 'Status Topic cambiato!'
    ),

    /*     Housekeeping     */
    'housekeeping' => array (
        'base' => array(
            'dashboard_header_title'    => 'Dashboard'
        ),
        'javascript' => array(
            'dashboard_table_username'  => 'Username'
        )
    )
);


// Traduzione eseguita da Biscotto e Daniel | FunnyTeam Gaming Community
// |-! In caso di traduzioni mancati o eseguite male contattate su Discord -> "[FT] Biscotto#0286" , in modo da poter aggiornare e far rilasciare dai creatori del CMS gli aggiornamenti, grazie. !-|

// Translation performed by Biscotto and Daniel | FunnyTeam Gaming Community
// | -! In case of missing or badly executed translations contact us on Discord -> "[FT] Biscotto#0286", in order to be able to update and have the updates released by the creators of the CMS, thanks. ! - |