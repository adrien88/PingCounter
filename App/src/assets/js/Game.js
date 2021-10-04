export class Game extends HTMLElement {
    
    constructor()
    {
        // create div
        super();

        this.table = document.createElement('div');
        this.table.id = 'table';
        this.table.classList.add('table');
        
        this.tableLeft = document.createElement('div');
        this.tableLeft.classList.add('left');

        this.tableRight = document.createElement('div');
        this.tableRight.classList.add('right');

        this.table.appendChild(this.tableLeft);
        this.table.appendChild(this.tableRight);
        this.appendChild(this.table);

        this.new();
    }


    /**
     * 
     */
    playing()
    {

    }

    /**
     * Create a new tenis match
     */
    new()
    {
        // clean table
        this.clean(this.tableRight);
        let form = document.createElement('form');
        
        let input1 = document.createElement('input');
        input1.setAttribute('name','player1');
        form.appendChild(input1);

        let input2 = document.createElement('input');
        input2.setAttribute('name','player2');
        form.appendChild(input2);
        
        let submit = document.createElement('input');
        submit.setAttribute('type','submit');
        form.appendChild(submit);

        form.addEventListener('submit', (e)=>{
            e.preventDefault();
            this.player1 = input1.value; 
            this.player2 = input2.value;
            this.playing();
        });
        
        //  insert content
        this.tableLeft.innerText = "Nouvelle Partie.";
        this.tableRight.appendChild(form);
    } 


    /**
     * 
     * @param {HTMLElement} object 
     */
     clean(object)
     {
         for (const child of object.children)
             object.removeChild(child);
     }


    
}