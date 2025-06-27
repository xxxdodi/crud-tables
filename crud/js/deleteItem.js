$(document).ready(function() {
    $(".delete").css({
        "color": "red",
        "background-color": "pink",
        "border": "none",
        "padding": "8px 16px",
        "cursor": "pointer",
        "border-radius": "4px"
    });

    $(".delete").click(function() {
        if (window.confirm("Вы уверены, что хотите удалить запись, которая связана с другими таблицами?")) {
            window.location.replace('/crud/' + $(this).attr("data-EntityName") + '/' + $(this).attr("data-itemId") + '/delete');
        }
    });
});

