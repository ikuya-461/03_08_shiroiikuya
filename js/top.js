function convertFromFirestoreTimestampToDatetime(timestamp) {
    const _d = timestamp ? new Date(timestamp * 1000) : new Date();
    const Y = _d.getFullYear();
    const m = (_d.getMonth() + 1).toString().padStart(2, '0');
    const d = _d.getDate().toString().padStart(2, '0');
    const H = _d.getHours().toString().padStart(2, '0');
    const i = _d.getMinutes().toString().padStart(2, '0');
    const s = _d.getSeconds().toString().padStart(2, '0');
    return `${Y}/${m}/${d} ${H}:${i}:${s}`;
}

var db = firebase.firestore().collection('comic');

$('#send').on('click', function () {

    const dataObject = {
        title: $('#title').val(), // inputの入力値
        auther: $('#auther').val(),
        volume: $('#volume').val(),
        when: $('#when').val(),
        impression: $('#impression').val(), // textareaの入力値
        time: firebase.firestore.FieldValue.serverTimestamp(), // 登録日時
    }
    db.add(dataObject);
    $('#impression').val('');
});

// 送信後にtextareaを空にする処理
db.orderBy('time', 'desc').onSnapshot(function (querySnapshot) {
    let str = '';
    querySnapshot.docs.forEach(function (doc) {
        // doc.idでidを，doc.data()でデータを取得できる const id = doc.id;

        const id = doc.id;
        const data = doc.data();
        const datatime = convertFromFirestoreTimestampToDatetime(data.time.seconds);

        str += '<li id="' + id + '" class="outputfield">';
        str += '<p>' + data.title + '</p>';
        str += '<p>' + data.auther + '</p>';
        str += '<p>' + data.volume + '</p>';
        str += '<p>' + data.when + '</p>';
        str += '<p>' + data.impression + '</p>';
        str += '<p>' + datatime + '</p>';
        str += '</li>';
    });

    $('#output').html(str);
});
