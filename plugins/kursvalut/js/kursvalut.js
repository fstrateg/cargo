/**
 * Created by 734 on 14.06.2017.
 */
function ShowKursvalut()
{
    $.ajax
    ({
        url: "index.php?r=kursvalut",
        beforeSend: function() {

        },
        success: function(data)
        {
            $("#kurs").html(data);
        }
    });
}
$(function() {
    $("#kurs").append('<div class="kurs"></div>');
    ShowKursvalut();
});