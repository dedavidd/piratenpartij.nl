angular.module("joinForm", []);

function JoinCtrl($scope) {
    if (/^\/update/.test(location.pathname)) {
        $scope._mode = "update";
    } else if (/^\/payment/.test(location.pathname)) {
        $scope._mode = "payment";
    } else {
        $scope._mode = "new";
    }
    $scope._submitting = false;
    $scope._title = $scope._mode == "new" ? "Nieuw lid" : "Lidmaatschap bijwerken";
    $scope.submit = function() {
        var prop, node,
            out = {};
        
        $scope._submitting = true;

        $(".ng-pristine").removeClass("ng-pristine").addClass("ng-dirty");

        for (prop in $scope) {
            if (/^[\$\_]/.test(prop) || prop == "isRequired" || prop == "this" || prop == "submit") {
                continue;
            }
            out[prop] = $scope[prop];
        }

        node = $("input.ng-invalid-required:visible").first();
        if (node.length) {
            node.focus();
            $scope._submitting = false;
        } else {
            // Do ajax
            $.ajax(location.pathname, {
                method: "post",
                data: {"data": JSON.stringify(out)},
            }).fail(function() {
                $("#completed").find(".alert").removeClass('alert-info').addClass('alert-danger')
                    .html("Er is een fout opgetreden. Neem eventueel contact op met het <a href='mailto:secretariaat@piratenpartij.nl'>secretariaat</a> voor assistentie.")
            }).always(function(data) {
                $("form").addClass('hidden');
                $("#completed").removeClass('hidden');
                $scope._submitting = false;
            });
        }
    }
    $scope.isRequired = function() {
        console.log(arguments);
        var visible = $(this).is(":visible"),
            id = $(this).attr('id');
        
        if (visible) {
            if (id) {
                $("[for='" + id + "']").append("<span style='color: red'> *</span>");
            } else {
                $(this).parent().append("<span style='color: red'> *</span>");
            }
        }

        return visible;
    };
    
    $scope.membership_level = "full";
    $scope.payment_method = "paypal";
    $scope.payment_amount = 50;
    $scope._states = ["Drenthe", "Flevoland", "Friesland", "Gelderland", "Groningen", "Limburg", "Noord-Brabant", "Noord-Holland", "Overijssel", "Utrecht", "Zeeland", "Zuid-Holland"];

    if ($scope._mode == "new" || $scope._mode == "payment") {
        $scope._msg = "Je inschrijving is met succes verstuurd. Je ontvangt binnen 10 minuten een e-mail met de bevestiging en een factuur.<br><br>Indien je die e-mail niet ontvangt, neem dan contact op met <a href='mailto:secretariaat@piratenpartij.nl'>secretariaat@piratenpartij.nl</a>.";
    } else {
        $scope._msg = "Je gegevens zijn met succes bijgewerkt. Bedankt!";
    }
}
