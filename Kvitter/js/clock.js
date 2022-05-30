//Skapar klockan
window.onload = function () {
    setInterval(showClock, 1000);

    function showClock() {

        //Deffinerar canvasen och dess delar
        var canvas = document.getElementById('canvas');
        var ctx = canvas.getContext('2d');

        var date = new Date;
        var angle;
        var secHandLength = 60;

        //Rensar allt från canvasen och uppdaterar den varje sekund
        ctx.clearRect(0, 0, canvas.width, canvas.height);        

        OUTER_DIAL1();
        OUTER_DIAL2();
        CENTER_DIAL();
        MARK_THE_HOURS();
        MARK_THE_SECONDS();

        SHOW_SECONDS();
        SHOW_MINUTES();
        SHOW_HOURS();

        function OUTER_DIAL1() {
            ctx.beginPath();
            ctx.arc(canvas.width / 2, canvas.height / 2, secHandLength + 10, 0, Math.PI * 2);
            ctx.strokeStyle = '#FFFFFF';
            ctx.stroke();
        }
        function OUTER_DIAL2() {
            ctx.beginPath();
            ctx.arc(canvas.width / 2, canvas.height / 2, secHandLength + 7, 0, Math.PI * 2);
            ctx.strokeStyle = '#FFFFFF';
            ctx.stroke();
        }
        function CENTER_DIAL() {
            ctx.beginPath();
            ctx.arc(canvas.width / 2, canvas.height / 2, 2, 0, Math.PI * 2);
            ctx.lineWidth = 3;
            ctx.fillStyle = '#353535';
            ctx.strokeStyle = '#0C3D4A';
            ctx.stroke();
        }

        //Skapar Timmätarna på klockan (1-12)
        function MARK_THE_HOURS() {

            for (var i = 0; i < 12; i++) {
                angle = (i - 3) * (Math.PI * 2) / 12;   // Vinkel på mätaren
                ctx.lineWidth = 1;  //Bredden på mätaren
                ctx.beginPath();

                var x1 = (canvas.width / 2) + Math.cos(angle) * (secHandLength);
                var y1 = (canvas.height / 2) + Math.sin(angle) * (secHandLength);
                var x2 = (canvas.width / 2) + Math.cos(angle) * (secHandLength - (secHandLength / 7));
                var y2 = (canvas.height / 2) + Math.sin(angle) * (secHandLength - (secHandLength / 7));

                ctx.moveTo(x1, y1);
                ctx.lineTo(x2, y2);

                ctx.strokeStyle = '#466B76';    //Timmarkerings färg
                ctx.stroke();
            }
        }
        //Skapar sekundmätarna på klockan
        function MARK_THE_SECONDS() {

            for (var i = 0; i < 60; i++) {
                angle = (i - 3) * (Math.PI * 2) / 60;   // Vinkel på mätaren
                ctx.lineWidth = 1;  //Bredden på mätaren
                ctx.beginPath();

                var x1 = (canvas.width / 2) + Math.cos(angle) * (secHandLength);
                var y1 = (canvas.height / 2) + Math.sin(angle) * (secHandLength);
                var x2 = (canvas.width / 2) + Math.cos(angle) * (secHandLength - (secHandLength / 30));
                var y2 = (canvas.height / 2) + Math.sin(angle) * (secHandLength - (secHandLength / 30));

                ctx.moveTo(x1, y1);
                ctx.lineTo(x2, y2);

                ctx.strokeStyle = '#C4D1D5';    //Sekundmarkerings färg
                ctx.stroke();
            }
        }

        //Sekundvisare
        function SHOW_SECONDS() {

            var sec = date.getSeconds();
            angle = ((Math.PI * 2) * (sec / 60)) - ((Math.PI * 2) / 4);
            ctx.lineWidth = 0.5;    //Visarens tjocklek
            ctx.beginPath();
            // START FROM CENTER OF THE CLOCK.
            ctx.moveTo(canvas.width / 2, canvas.height / 2);   
            // DRAW THE LENGTH.
            ctx.lineTo((canvas.width / 2 + Math.cos(angle) * secHandLength),
                canvas.height / 2 + Math.sin(angle) * secHandLength);

            // DRAW THE TAIL OF THE SECONDS HAND.
            ctx.moveTo(canvas.width / 2, canvas.height / 2);    //Gör så att den börjar från mitten
            // DRAW THE LENGTH.
            ctx.lineTo((canvas.width / 2 - Math.cos(angle) * 20),
                canvas.height / 2 - Math.sin(angle) * 20);

            ctx.strokeStyle = '#FF0000';    //Visarens färg
            ctx.stroke();
        }

        //Minutvisare
        function SHOW_MINUTES() {

            var min = date.getMinutes();
            angle = ((Math.PI * 2) * (min / 60)) - ((Math.PI * 2) / 4);
            ctx.lineWidth = 1.5;    //Visarens tjocklek

            ctx.beginPath();
            ctx.moveTo(canvas.width / 2, canvas.height / 2);    //Gör så att den börjar från mitten
            // DRAW THE LENGTH.
            ctx.lineTo((canvas.width / 2 + Math.cos(angle) * secHandLength / 1.1),      
                canvas.height / 2 + Math.sin(angle) * secHandLength / 1.1);

            ctx.strokeStyle = '#FFFFFF';    //Visarens färg
            ctx.stroke();
        }

        //Timvisare
        function SHOW_HOURS() {

            var hour = date.getHours();
            var min = date.getMinutes();
            angle = ((Math.PI * 2) * ((hour * 5 + (min / 60) * 5) / 60)) - ((Math.PI * 2) / 4);
            ctx.lineWidth = 1.5;    //Visarens tjocklek

            ctx.beginPath();
            ctx.moveTo(canvas.width / 2, canvas.height / 2);     //Gör så att den börjar från mitten
            // DRAW THE LENGTH.
            ctx.lineTo((canvas.width / 2 + Math.cos(angle) * secHandLength / 1.5),      
                canvas.height / 2 + Math.sin(angle) * secHandLength / 1.5);

            ctx.strokeStyle = '#000';   //Visarens färg
            ctx.stroke();
        }
    }
}