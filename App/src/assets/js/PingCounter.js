export class PingCounter {

    static createButton(player){
        let button = document.createElement('button');
        button.innerText = player;
        let score = document.createElement('div');
        score.id = 'score#'+player;

        button.addEventListener('click', (e)=>{
            e.preventDefault();
            //
            fetch('?page=playing&player='+player)
            .then((response)=>{
                if (response.ok)
                    return response.json();
                else
                    console.log(response.statusText);
            })
            .then((data)=>{
                if (undefined !== data){
                    if ('closed' !== data['scores']){
                        // console.log(data['scores'][player]);
                        score.innerText = data['scores'][player]; 
                    }
                    else {
                        location.href = "./?page=scores";
                    }
                }
            })
        });


        return [score, button];
    }

}