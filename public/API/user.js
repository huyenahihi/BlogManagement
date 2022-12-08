let url_users = 'http://localhost:8000/user';
let url_ranks = 'http://localhost:8000/rank';
let url_updateranks = 'http://localhost:8000/updaterank';
fetchText();
async function fetchText() {
    let user = await fetch(url_users);
    let rank = await fetch(url_ranks);
    let updaterank = await fetch(url_updateranks);

    if (user.status === 200) {
        let listuser = await user.json();
        let listrank = await rank.json();
        let listupdateranker = await updaterank.json();
        var apiuser = listuser.filter(function(person) {
            return person.type == 'user';
        });
    function getUser(){
        return new Promise(resolve => {
            setTimeout(function(){
                resolve(apiuser)
            }, 500);
        })
    }
    function getRankByIds(userId){
        return new Promise(resolve => {
             var results = listrank.filter(function (rank) {
               return userId.includes(rank.id);
             });
             setTimeout(function(){
                 resolve(results);
             });     
        });
     }
     function getUpdateRankByIds(userId){
        return new Promise(resolve => {
             var results = listupdateranker.filter(function (updaterank) {
               return userId.includes(updaterank.id_user);
             });
             setTimeout(function(){
                 resolve(results);
             });     
        });
     }
    getUser().then(function(users){
            var UserId = users.map(function (user) {
                return user.id;
            });
            var rankId = users.map(function (user) {
                return user.ranker;
            });
            return getRankByIds(rankId).then(function (rank) {
                return getUpdateRankByIds(UserId).then(function (updaterank) {
                    return {
                        rank : rank,
                        user : apiuser,
                        updaterank : updaterank
                    };
                });
            });
        }).then(function(data){
            console.log(data);
           var html = '';
           var i = 1;
        //    console.log(data);
            data.user.map(function (response){
                var rankss = data.rank.find(function (rank){
                    return rank.id === response.ranker;
                });
                
                var listviewrank = data.updaterank.filter(function (view){
                    return view.id_user == response.id;
                });
                html += `
                <tr class="data-id-${response.id}">
                <td data-label="STT">${i++}</td>
                <td data-label="Hình ảnh" style="text-align: center;"><img
                        style="width: 50px;height: 50px; border-radius: 100%; object-fit: cover;"
                        src="${response.avatar}" alt=""></td>
                <td data-label="Tên">${response.name}</td>
                <td data-label="Email">${response.email}</td>
                <td data-label="Email">${rankss.name}</td>
                <td data-label="Email">${listviewrank.length}</td>
                <td data-label="Phone">${response.phone}</td>
                <td data-label="Xoá" class="right__iconTable"><a><img
                            src="assets/icon-trash-black.svg" onclick="deleteUser(${response.id})" alt=""></a></td>
            </tr>
                `;
                document.getElementById('listuser').innerHTML = html;
            })
        })
    }

}
    
