var Main;

function MainInterface() {
    this.body = null;
    this.container = null;
    this.page = null;
    this.initialize = function() {
        this.body = $('body');
        this.container = $('body').find('.page-container');
        this.responsive();
        this.dialogManager = new DialogManagerInterface();
        this.pageManager = new PageInterface();
        this.pageManager.initialize(this.page);
    };
    this.responsive = function() {
        var self = this;
        this.body.find(".navigation-container").after('<nav class="mobile-navigation-container"><ul class="navigation-menu"></ul></nav>');
        this.body.find(".navigation-container .navigation-menu .navigation-item:not(.main-link-item):not(.navigation-right-side-item)").each(function() {
            var mobile_item = $(this).clone().appendTo(".mobile-navigation-container .navigation-menu");
            mobile_item.removeClass("selected").removeAttr("data-category");
            if (mobile_item.hasClass("has-items"))
                mobile_item.children("a").attr("href", "#");
        });
        $('<li class="navigation-item mobile-menu cant-select">Menu</li>').prependTo(".navigation-container .navigation-menu").click(function() {
            self.body.find(".mobile-navigation-container").finish().slideToggle();
            self.body.find(".mobile-navigation-container .navigation-item.has-items .navigation-submenu").finish().slideUp();
        });
        this.body.find(".mobile-navigation-container .navigation-item.has-items>a").click(function() {
            self.body.find(".mobile-navigation-container .navigation-item.has-items").not($(this).parent()).find(".navigation-submenu").finish().slideUp();
            $(this).parent().find(".navigation-submenu").finish().slideToggle();
        });
        this.body.find(".mobile-navigation-container a").click(function() {
            if ($(this).attr("href") !== "#") {
                self.body.find(".mobile-navigation-container .navigation-item.has-items .navigation-submenu").finish().slideUp();
                self.body.find(".mobile-navigation-container").finish().slideUp();
            }
        });
    };
    this.cookies = function() {
        if (Cookies.get("allow_cookies") === undefined) {
            this.body.find(".cookies-container").show();
            this.body.find(".cookies-container .close-container").click(function() {
                Cookies.set("allow_cookies", true, {
                    expires: 365
                });
                $(this).parent().hide();
            });
        }
    };
}

function PageInterface() {
    var container = $('body').find('.page-container');
    this.initialize = function(page) {
      
        var str = window.location.pathname;
        var n = str.lastIndexOf('/');
        var result = str.substring(n + 1);
      
        if (result === 'index') {
            container.find(".reload").click(function() {
                var captchaImage = $('.captcha-img').attr('src');
                $('.captcha-img').attr('src', captchaImage + '?rand=' + Math.random());
            });
        } else if (result === 'register') {
            container.find(".selectric").selectric({
                theme: "web"
            });
            Register = new RegisterInterface();
            Register.initialize();
        } else if (page === 'me') {
            Me = new MeInterface();
            News = new NewsInterface();
            Me.initialize();
            News.initialize();
        } else if (page === 'community') {
            News = new NewsInterface();
            News.initialize();
        } else if (page === 'settings') {
            container.find(".selectric").selectric({
                theme: "web"
            });
            Settings = new SettingsInterface();
            Settings.initialize();
        } else if (page === 'forgot') {
            container.find(".selectric").selectric({
                theme: "web"
            });
        } else if (page === 'store') {
            Namechange = new NameChangeInterface();
            Namechange.initialize();
        } else if (page === 'forum' || page === 'forum_thread') {
            container.find(".selectric").selectric({
                theme: "web"
            });
            Forum = new ForumInterface();
            Forum.initialize();
        } else if (page === 'news') {
            container.find(".selectric").selectric({
                theme: "web"
            });
        }
    };
}

function DialogManagerInterface() {
    this.buttons = null;
    this.input = null;
    this.inputType = null;
    this.type = null;
    this.title = null;
    this.content = null;
    this.callback = null;
    this.create = function(type, content, title, buttons, input, inputType, callback) {
        this.buttons = {
            cancel: "Annuleer",
            confirm: "Verder",
            report: "Ja, dit bericht is ongepast"
        };
        this.type = null;
        this.title = null;
        this.content = null;
        this.input = null;
        this.inputType = null;
        this.callback = null;
        this.type = type;
        this.title = title === undefined ? "Bevestig uw keuze" : title;
        this.content = content;
        this.callback = callback;
        this.input = input;
        this.inputType = inputType;
        if (buttons !== undefined)
            this.assign_buttons(buttons);
        this.build();
    };
    this.build = function() {
        var self = this;
        var template = ['<div class="' + this.type + '-popup dialog-popup zoom-anim-dialog">\n' +
            '    <h3>' + this.title + '</h3>\n' +
            '    ' + this.content + '\n' +
            '    <div class="input-container"></div>' +
            '    <div class="buttons-container"></div>' +
            '</div>'
        ].join("");
        var dialog = $(template);
        dialog.find(".buttons-container").append('<button class="rounded-button ' + (this.type === "confirm" ? 'red' : 'lightblue') + ' cancel">' + this.buttons.cancel + '</button>');
        if (this.input !== null) {
            dialog.find(".input-container").append('<br /><input type="' + (this.inputType !== null ? this.inputType : 'text') + '" class="' + this.input + ' rounded-input purple-active dialog-input">');
        }
        if (this.type === "confirm")
            dialog.find(".buttons-container").append('<button class="rounded-button red plain confirm">' + this.buttons.confirm + '</button>');
        $.magnificPopup.open({
            modal: this.type === "confirm",
            items: {
                src: dialog,
                type: "inline"
            },
            callbacks: {
                open: function() {
                    var content = $(this.content);
                    content.unbind().on("click", ".confirm", function() {
                        var result = $('.dialog-input').map(function() {
                            return $(this).val();
                        }).toArray();
                        $.magnificPopup.close();
                        $(document).off("keydown", keydownHandler);
                        if (typeof self.callback === "function")
                            self.callback(result)
                    }).on("click", ".cancel", function() {
                        $.magnificPopup.close();
                        $(document).off("keydown", keydownHandler);
                    });
                    var keydownHandler = function(event) {
                        if (event.keyCode === 13) {
                            content.find(".confirm").click();
                            return false;
                        } else if (event.keyCode === 27) {
                            content.find(".cancel").click();
                            return false;
                        }
                    };
                    $(document).on("keydown", keydownHandler);
                }
            }
        });
    };
    this.assign_buttons = function(buttons) {
        for (var name in buttons) {
            if (buttons.hasOwnProperty(name))
                this.buttons[name] = buttons[name];
        }
    };
}

function RegisterInterface() {
    this.container = $('body').find('.page-container');
    this.gender = 'male';
    this.initialize = function() {
        var self = this;
        self.container.find(".tabs-container span").click(function() {
            if (!$(this).hasClass("selected"))
                self.updateAvatar($(this).attr("data-avatar"));
        });
        self.container.find('.username').blur(function() {
            var username = self.container.find('input[name = "bean_avatarName"]').val();
            self.nameCheck(username);
        });
        self.container.find(".reload").click(function() {
            var captchaImage = $('.captcha-img').attr('src');
            $('.captcha-img').attr('src', captchaImage + '?rand=' + Math.random());
        });
    };
    this.nameCheck = function(username) {
        var self = this;
        $.post("/api/player", {
            username: username
        }).done(function(data) {
            if (data === "0") {
                self.container.find('.username').css('border', '1px solid lightgreen');
                self.container.find('.form-help.form-username').html('Deze Leetnaam is beschikbaar! :)');
            } else {
                self.container.find('.username').css('border', '2px solid red');
                self.container.find('.form-help.form-username').html('Deze Leetnaam is niet beschikbaar! :(');
            }
        });
    }
}

function MeInterface() {
    this.container = $('body').find('.page-container');
    this.path = 'https://listen.leetmusic.nl';
    this.api = this.path + '/api/nowplaying_static/leetmusic.json';
    this.radio = this.path + '/radio/8000/radio.mp3';
    this.initialize = function() {
        this.loadFriends();
        this.loadStreamData();
        this.startRadio();
    };
    this.loadFriends = function() {
        var body = $('body');
        var friends = body.find('.friends');
        var open = false;
        body.find('.show-friends').click(function() {
            if (open === false) {
                open = true;
                friends.attr("style", "display: block !important");
            } else {
                open = false;
                friends.attr("style", "display: none");
            }
        });
    }
    this.loadStreamData = function() {
        $.ajaxSetup({
            cache: false
        });
        $.getJSON(this.api, function(data) {
            var artist = data['now_playing']['song']['artist'];
            var title = data['now_playing']['song']['title'];
            var artistClean = artist.length > 50 ? artist.substring(0, 50) + "..." : artist;
            var titleClean = title.length > 100 ? title.substring(0, 100) + "..." : title;
            var music = titleClean + ' - ' + artistClean;
            var formattedMusic = music.replace(/;/g, ', ');
            var dj = data['live']['streamer_name'] == '' ? 'Willie' : artist;
            $('#dj').html(dj);
            $('#figure').css('background-image', 'url("https://www.leet.ws/api/figure/' + dj + '")');
            $('#listeners').html(data['listeners']['current']);
            $('#song').html(formattedMusic);
            $('#song').attr('data-original-title', formattedMusic);
        });
    }
    this.startRadio = function() {
        var self = this;
        var stream = document.getElementById("streamPlayer");
        if (stream.src != self.radio)
            stream.src = self.radio;
        stream.volume = 0.05;
    }
}

function NewsInterface() {
    this.template = ['<div class="article-container" style="display: none;">\n' +
        '    <a href="https://www.leet.ws/news/{news.id}-{news.slug}" class="article-content" style="background-image: url({news.banner});">\n' +
        '        <div class="article-header">\n' +
        '            <div class="article-separation" style="background-color: {news.header_color};"></div>\n' +
        '            <div class="article-title title" data-id="{news.id}">{news.title}</div>\n' +
        '            <div class="article-title title-sub" data-id="{news.id}" style="display: none;">{news.title}</div>\n' +
        '        </div>\n' +
        '    </a>\n' +
        '</div>'
    ].join("");
    this.current_page = 1;
    this.initialize = function() {
        var self = this;
        var container = $('body').find('.page-container');
        container.find('.load-more-button button').click(function() {
            var countdivs = $('.article-container').length;
            $.ajax({
                type: 'post',
                url: '/news/load/more',
                data: {
                    current_page: self.current_page,
                    offset: countdivs
                },
                dataType: 'json'
            }).done(function(result) {
                if (result.news.length > 0) {
                    for (var i = 0; i < result.news.length; i++) {
                        var data = result.news[i];
                        var template = $(self.template.replace(/{news.slug}/g, data.slug).replace(/{news.banner}/g, data.header).replace(/{news.id}/g, data.id).replace(/{news.category}/g, data.category).replace(/{news.header_color}/g, data.header_color).replace(/{news.title}/g, data.title));
                        container.find(".articles-container").append(template);
                        template.fadeIn();
                    }
                    self.current_page = result.current_page;
                }
                if (typeof callback === "function")
                    callback(result);
            });
        });
    }
}

function SettingsInterface() {
    var container = $('body').find('.page-container');
    var option = container.find('.option');
    this.initialize = function() {
        container.find(".captcha .reload").click(function() {
            var captchaImage = $('.captcha-img').attr('src');
            $('.captcha-img').attr('src', captchaImage + '?rand=' + Math.random());
        });
        option.find('#toggle').change(function() {
            var data = $(this).attr('data-id');
            var value = this.checked;
            var array = ['hide_home', 'hide_online', 'hide_last_online', 'hide_inroom', 'hide_staff'];
            if ($.inArray(data, array) !== -1)
                value = value ? false : true;
            $.ajax({
                type: 'post',
                dataType: 'json',
                url: '/settings/preferences',
                data: {
                    data: data,
                    value: value
                }
            });
        });
    }
}

function NameChangeInterface() {
    var container = $('body').find('.page-container');
    var username = container.find('input[name = "bean_terms"]').val();
    this.initialize = function() {
        container.find('input[name = "bean_terms"]').click(function() {
            container.find('input[name = "username"]').removeAttr('disabled', 'disabled').html('Koop');
        });
        container.find('.check').click(function() {
            var self = this;
            var username = container.find('input[name = "username"]').val();
            $.post("/api/player", {
                username: username
            }).done(function(data) {
                if (data === "0") {
                    container.find('.username').css('border', '1px solid lightgreen');
                    container.find('.form-help.form-username').html('<font color="green"><strong>Deze Leetnaam is beschikbaar! :)</strong></font>');
                    container.find('.column-1').removeAttr('style', '');
                    container.find('.submit-button button').removeAttr('disabled', 'disabled').html('Koop');
                    container.find('.form-price').html('Dit kost <strong class="price">25</strong> Bel-Credits.');
                } else {
                    $.post("/api/player/namechange", {
                        username: username
                    }).done(function(data) {
                        if (data === "0") {
                            container.find('.username').css('border', '2px solid red');
                            container.find('.form-help.form-username').html('<font color="red"><strong>Deze Leetnaam is niet beschikbaar! :(</strong></font>');
                            container.find('.column-1').removeAttr('style', '');
                            container.find('.submit-button button').attr('disabled', 'disabled');
                            container.find('.form-price').html('');
                        } else {
                            container.find('.username').css('border', '1px solid lightgreen');
                            container.find('.form-help.form-username').html('<font color="green"><strong>Deze Leetnaam is misschien beschikbaar! :)</font>');
                            container.find('.column-1').removeAttr('style', '');
                            container.find('.submit-button button').removeAttr('disabled', 'disabled').html('Aanvragen');
                            container.find('.form-price').html('Dit kost <strong class="price">100</strong> Bel-Credits.<br>Wanneer je aanvraag wordt afgewezen krijg je de Bel-Credits automatisch terug');
                        }
                    });
                }
            });
        });
    }
}

function ForumInterface() {
    var container = $('body').find('.page-container .default-section');
    var threadId = $('body').find('.page-container .page-content').attr('data-thread-id');
    this.initialize = function() {
        this.add();
        this.edit();
        this.reply();
        this.report();
        this.remove();
        var wbbOpt = {
            buttons: "bold,italic,underline,fontcolor,link,video,quote",
            hotkeys: false,
            showHotkeys: false
        }
        $("#bbcode-editor").wysibb(wbbOpt);
        container.find(".captcha .reload").click(function() {
            var captchaImage = $('.captcha-img').attr('src');
            $('.captcha-img').attr('src', captchaImage + '?rand=' + Math.random());
        });
    }
    this.add = function() {
        var isNew = true;
        $('.new-thread').click(function() {
            if (isNew) {
                container.find('.forum-new-content').removeAttr('style');
                container.find('.forum-content').attr('style', 'display: none');
                isNew = false;
            } else {
                container.find('.forum-new-content').attr('style', 'display:none');
                container.find('.forum-content').removeAttr('style');
                isNew = true;
            }
        });
        $('.cancel').click(function() {
            container.find('.forum-new-content').attr('style', 'display:none');
            container.find('.forum-content').removeAttr('style');
        });
    }
    this.edit = function() {
        $('.edit-post').click(function() {
            var postId = $(this).attr('data-post-id');
            var postValue = container.find('.forum-post-message[data-post-id=' + postId + ']');
            var hiddenMessage = container.find('input[name="' + postId + '-message"]');
            var isThread = container.find('input[name="' + postId + '-thread"]').val();
            if (postId === null || postId === undefined || postId == null || postId == undefined)
                return;
            var editableText = isThread !== undefined ? $('<div class="forum-post-message" data-post-id="' + postId + '">\n' +
                '<div class="column space-bottom">\n' +
                '<h5>Type</h5>\n' +
                '<div class="birth-date">\n' +
                '<select name="type" class="selectric">\n' +
                '<option value="OPEN" selected>Open</option>\n' +
                '<option value="CLOSED">Gesloten</option>\n' +
                '</select>\n' +
                '</div><br><br><br>\n' +
                '<textarea name="message" id="bbcode-editor" style="height: 230px">' + hiddenMessage.val() + '</textarea></div>\n' +
                '<div class="column space-bottom" style="width: 40%;float:right">\n' +
                '<div class="captcha" style="text-align: center">\n' +
                '<img class="captcha-img" src="/captcha"><br>\n' +
                '<img src="/assets/images/icons/reload.gif"> <a class="reload" style="font-size: 12px;cursor: pointer">Ik kan dit niet lezen! Ik wil een nieuwe code!</a>\n' +
                '</div>\n' +
                '<h5>Vul de veiligheidscode in</h5>\n' +
                '<input type="text" name="' + postId + '-captcha" class="rounded-input blue-active" placeholder="Veiligheidscode..." required autocomplete="off">\n' +
                '</div>' +
                '<div class="column"><div class="save rounded-button blue plain">Opslaan</div>\n' +
                '<div class="cancel rounded-button red plain">Afbreken</div></div></div>') : $('<div class="forum-post-message" data-post-id="' + postId + '">\n' +
                '<div class="column space-bottom">\n' +
                '<div class="birth-date">\n' +
                '</div><br><br><br>\n' +
                '<textarea name="message" id="bbcode-editor" style="height: 230px">' + hiddenMessage.val() + '</textarea></div>\n' +
                '<div class="column space-bottom" style="width: 40%;float:right">\n' +
                '<div class="captcha" style="text-align: center">\n' +
                '<img class="captcha-img" src="/captcha"><br>\n' +
                '<img src="/assets/images/icons/reload.gif"> <a class="reload" style="font-size: 12px;cursor: pointer">Ik kan dit niet lezen! Ik wil een nieuwe code!</a>\n' +
                '</div>\n' +
                '<h5>Vul de veiligheidscode in</h5>\n' +
                '<input type="text" name="' + postId + '-captcha" class="rounded-input blue-active" placeholder="Veiligheidscode..." required autocomplete="off">\n' +
                '</div>' +
                '<div class="column"><div class="save rounded-button blue plain">Opslaan</div>\n' +
                '<div class="cancel rounded-button red plain">Afbreken</div></div></div>');
            $('.forum-post').attr('style', 'display: none');
            $('.edit-post').attr('style', 'display: none');
            postValue.replaceWith(editableText);
            container.find(".captcha .reload").click(function() {
                var captchaImage = $('.captcha-img').attr('src');
                $('.captcha-img').attr('src', captchaImage + '?rand=' + Math.random());
            });
            container.find("select[name = 'type'].selectric").selectric({
                theme: "web",
                labelBuilder: "{text}",
                onChange: function() {
                    self.type = $(this).val();
                }
            });
            var wbbOpt = {
                buttons: "bold,italic,underline,fontcolor,link,video,quote",
                hotkeys: false,
                showHotkeys: false
            }
            $("#bbcode-editor").wysibb(wbbOpt);
            $('.cancel').click(function() {
                self.location.reload();
            });
            $('.save').click(function() {
                var message = $("#bbcode-editor").bbcode();
                var type = container.find("select[name = 'type']").val();
                var captcha = container.find('input[name="' + postId + '-captcha"]').val();
                if (type === undefined || type === null) {
                    var value = {
                        thread_id: threadId,
                        post_id: postId,
                        message: message,
                        captcha: captcha
                    };
                } else {
                    var value = {
                        thread_id: threadId,
                        post_id: postId,
                        type: type,
                        message: message,
                        captcha: captcha
                    };
                }
                $.post("/forum/post/edit", value);
                self.location.reload();
            });
        });
    }
    this.reply = function() {
        $('.reply-post').click(function() {
            var postId = $(this).attr('data-post-id');
            var hiddenMessage = container.find('input[name="' + postId + '-message"]').val();
            $("#bbcode-editor").bbcode('[quote]' + hiddenMessage + '[/quote]');
            $('html,body').animate({
                scrollTop: 9999
            }, 'slow');
        });
    }
    this.report = function() {
        $('.report-post').click(function() {
            var postId = $(this).attr('data-post-id');
            var value = {
                post_id: postId
            }
            Main.dialogManager.create("confirm", "Is dit bericht ongepast en/of in strijd met de Leet Regels?", "Bericht rapporteren...", null, null, null, function(result) {
                $.post("/forum/post/report", value).done(function(data) {
                    Main.dialogManager.create("confirm", "Bedankt voor het rapporteren van dit bericht!", "Bericht aangegeven bij de Leet Staff", null, null, null, function(result) {
                        $.magnificPopup.close();
                    });
                });
            });
        });
    }
    this.remove = function() {
        $('.remove-thread').click(function() {
            var threadId = $(this).attr('data-thread-id');
            var postId = $(this).attr('data-post-id');
            var value = {
                thread_id: threadId,
                post_id: postId
            }
            Main.dialogManager.create("confirm", "Weet je zeker dat je dit topic wilt verwijderen?", "Weet je het zeker?", null, null, null, function(result) {
                $.post("/forum/thread/remove", value).done(function(data) {
                    self.location.reload();
                    $.magnificPopup.close();
                });
            });
        });
        $('.remove-post').click(function() {
            var threadId = $(this).attr('data-thread-id');
            var postId = $(this).attr('data-post-id');
            var value = {
                thread_id: threadId,
                post_id: postId
            }
            Main.dialogManager.create("confirm", "Weet je zeker dat je dit bericht wilt verwijderen?", "Weet je het zeker?", null, null, null, function(result) {
                $.post("/forum/post/remove", value).done(function(data) {
                    self.location.reload();
                    $.magnificPopup.close();
                });
            });
        });
    }
}
$(function() {
    Main = new MainInterface();
    Main.initialize();
});