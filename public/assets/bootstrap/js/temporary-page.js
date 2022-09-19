function imFeelingLuckyHandler(target) {
    request.post('/api/lottery', {user_id: target.getAttribute('data-user')}).then((response) => {
        response = JSON.parse(response);
        console.log(response);
        alert("You : " + response.result + ";\n Random Number: " + response.random_value + ";\n Win amount: " + response.win_amount);
    });
}

function historyHandler(target) {
    request.get('/api/lottery/' + target.getAttribute('data-user')).then((response) => {
        response = JSON.parse(response);
        let items = response.data;
        if (items.length) {
            var print = '';
            for (var i = 0; i < items.length; i++) {
                print += "\n  You : " + items[i].result +
                    "; Random Number: " + items[i].random_value +
                    "; Win amount: " + items[i].win_amount +
                    "; Date: " + items[i].created_at;
            }

            alert(print);
        }
    });
}

function generateLinkHandler(target) {
    request.post('/api/links', {user_id: target.getAttribute('data-user')}).then((response) => {
        response = JSON.parse(response);
        if (response.url) alert("Your link : " + response.url);
    });
}


function deleteLinkHandler(target) {
    request.delete('/api/links', {
        user_id: target.getAttribute('data-user'),
        uuid: window.location.pathname.split('/').slice(-1)[0]
    }).then((response) => {
        response = JSON.parse(response);
        if (response.success) alert("Your Link Was Deleted!");
    });
}

