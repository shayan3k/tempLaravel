var ComponentsSelect2 = function() {

    var handleSelectBoxes = function() {

        $.fn.select2.defaults.set("theme", "bootstrap");

        var placeholder = "Select a State";

        $(".select2, .select2-multiple").select2({
            placeholder: placeholder,
            width: null
        });

        $(".select2-allow-clear").select2({
            allowClear: false,
            placeholder: placeholder,
            width: null
        });

        // @see https://select2.github.io/examples.html#data-ajax
        function formatRepo(repo) {
            if (repo.loading) return repo.text;

            var markup = "<div class='select2-result-repository clearfix'>";

            if(repo.image) {
                markup += "<div class='select2-result-repository__avatar'><img src='" + repo.image + "' /></div>";
                markup += "<div class='select2-result-repository__meta'>";
            }

            markup += "<div class='select2-result-repository__title'>" + repo.name + "</div></div>";

            if (repo.username) {
                markup += "<div class='select2-result-repository__description'>نام کاربری: " + repo.username + "</div>";
            }

            if(repo.image) {
                markup += "</div>"; // closing tag for 'select2-result-repository__meta'
            }

            markup += "<div class='select2-result-repository__statistics'>";
            if(repo.meta1) {
                markup += "<div class='select2-result-repository__forks'>" + repo.meta1 + "</div>";
            }
            if(repo.meta2) {
                markup += "<div class='select2-result-repository__stargazers'>" + repo.meta2 + "</div>";
            }
            if(repo.meta3) {
                markup += "<div class='select2-result-repository__watchers'>" + repo.meta3 + "</div>";
            }
            markup += "</div>";

            return markup;
        }

        function formatRepoSelection(repo) {

            return repo.name || repo.username;
        }

        $("*[data-remote-load-data]").each(function() {
            var $this = $(this);

            $this.select2({
                width: "off",
                ajax: {
                    url: $this.attr('data-remote-url'),
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        return {
                            keyword: params.term
                        };
                    },
                    processResults: function(data) {
                        return {
                            results: data
                        };
                    },
                    cache: true
                },

                escapeMarkup: function(markup) {
                    return markup;
                }, // let our custom formatter work
                minimumInputLength: 3,
                templateResult: formatRepo,
                templateSelection: formatRepoSelection
            });
        });


        $("button[data-select2-open]").click(function() {
            $("#" + $(this).data("select2-open")).select2("open");
        });

        $(":checkbox").on("click", function() {
            $(this).parent().nextAll("select").prop("disabled", !this.checked);
        });

        // copy Bootstrap validation states to Select2 dropdown
        //
        // add .has-waring, .has-errors, .has-succes to the Select2 dropdown
        // (was #select2-drop in Select2 v3.x, in Select2 v4 can be selected via
        // body > .select2-container) if _any_ of the opened Select2's parents
        // has one of these forementioned classes (YUCK! ;-))
        $(".select2, .select2-multiple, .select2-allow-clear, *[data-remote-load-data]").on("select2:open", function() {
            if ($(this).parents("[class*='has-']").length) {
                var classNames = $(this).parents("[class*='has-']")[0].className.split(/\s+/);

                for (var i = 0; i < classNames.length; ++i) {
                    if (classNames[i].match("has-")) {
                        $("body > .select2-container").addClass(classNames[i]);
                    }
                }
            }
        });

        $(".js-btn-set-scaling-classes").on("click", function() {
            $("#select2-multiple-input-sm, #select2-single-input-sm").next(".select2-container--bootstrap").addClass("input-sm");
            $("#select2-multiple-input-lg, #select2-single-input-lg").next(".select2-container--bootstrap").addClass("input-lg");
            $(this).removeClass("btn-primary btn-outline").prop("disabled", true);
        });
    };

    return {
        //main function to initiate the module
        init: function() {
            handleSelectBoxes();
        }
    };

}();

jQuery(document).ready(function() {
    ComponentsSelect2.init();
});
