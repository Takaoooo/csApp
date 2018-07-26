
<script>
jQuery(function ($) {
      $.ajax({
        //外部サイトとの接続を可能に
        crossDomain: true,
        //POST:HTTP通信で、サーバへ情報を登録する時に使用する
        //GET:HTTP通信で、サーバから情報を取得してくる時に使用する
        type: 'POST',
        //HTTP通信時にどのサーバとやり取りするか
        url: wp_url_admin_ajax,
        //クエリーパラメータを指定
        //送信するデータ（「キー名: 値」のハッシュ形式）
        data: {
          'action': 'tell_me'
        }, 
        dataType:'json',
      }).done(function(data) {
            alert("success!!");
            var OpenDataMarker = new Array();
            for (i = 0; i < json.length; i++) {
            OpenDataMarker.push = new google.maps.Marker({
            position: create_marker,
            //position: new google.maps.LatLng(markerData[i].lat, markerData[i].lng),
            map: openDataMap
          });
          dispInfo(OpenDataMarker[i]);
        };
      }).fail(function(XMLHttpRequest, textStatus, errorThrown) {
        alert('error!!!');
        console.log("ajax通信に失敗しました");
        console.log("XMLHttpRequest : " + XMLHttpRequest.status);
        console.log("textStatus     : " + textStatus);
        console.log("errorThrown    : " + errorThrown.message);
      });
</script>