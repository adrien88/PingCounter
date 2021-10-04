export class Player extends HTMLDivElement {

    constructor(player){
        super();
        this.id = 'player#'+player;
        this.createScore();
        this.createButton();
    }

    createButton(){
        this.button = document.createElement('button');
        this.appendChild(this.button);
    }
    
    createScore(){
        this.score = document.createElement('div');
        this.appendChild(this.score);
    }

    bindButton()
    {
        this.button.addEventListener(()=>{
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
    }



}