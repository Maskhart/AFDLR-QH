$(document).ready(function()
{
    
    function nl2br (str, is_xhtml) {   
        var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br />' : '<br>';    
        return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1'+ breakTag +'$2');
    }
    
    $.ajax({
        url: 'ajax/get-live.php',
        success: function(data, success) {

            var live = jQuery.parseJSON(data);
                        if (live.PrestationMusique.Musique.IdentifiantVideo !== null){
                            var html =  '<video controls width="100%" height="240"';
                                html += '<source src="' + live.PrestationMusique.Musique.Video.Chemin  + '" type="video/mp4">';
                            html += '</video>';
                        } 
                        else{
                            html += '<div class="parole">' + nl2br(live.PrestationMusique.Musique.Paroles) + '</div>';
                        }
                
                    html += '</div>';
            $('.video').append(html);
        }
    });
    
    
    $('#video').on('click', function() {
        $.ajax({
            
            url: 'ajax/get-live.php',
            success: function(data, success) {
                
                $('.video').empty();
                
                var live = jQuery.parseJSON(data);
                if (live.PrestationMusique.Musique.IdentifiantVideo == null){
                            var html =  '<span>Pas de vidéo disponible pour cette chanson</span>';
                        }
                else {
                    var html =  '<video controls width="100%" height="240"';
                
                        html += '<source src="' + live.PrestationMusique.Musique.Video.Chemin  + '" type="video/mp4">';
                    html += '</video>';
                $('.video').append(html);
            }
            }
        });  
    });
    
    $('#parole').on('click', function() {
        $.ajax({
            
            url: 'ajax/get-live.php',
            success: function(data, success) {
                
                $('.video').empty();
                
                var live = jQuery.parseJSON(data);

                var html = '<div class="parole">' + nl2br(live.PrestationMusique.Musique.Paroles) + '</div>';
                $('.video').append(html);
            }
        });  
    });
});
