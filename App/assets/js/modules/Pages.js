export class Pages {
    
    constructor(){
        for (const link of document.getElementsByTagName('inner')) {
            link.addEventListener('click', (e)=>{
                e.preventDefault();
                this.load(link.getAttribute('href'));
            });
        }
    }

    load($url){
        feth($url)
        .then((Response)=>{
            if(Response.ok)
            if (Response.headers.ContentType.match(/application\/json/i))
                return Response.json();
            else 
                return Response.text();
            else 
                console.log('Not found')
        })
        .then((data)=>{

        });
    }

    parser(data){
        for (const key in data) {
            const element = data[key];
            for (const elem of document.querySelectorAll(key)) {
                
                elem.appendChild();
            }
        }
    }


}