

let Rubrique = function () {


    Rubrique.prototype.setPk = function (pk) {
        this.pk = pk;
    }

    Rubrique.prototype.setNom = function (nom) {
        this.nom = nom;
    }

    Rubrique.prototype.getPk = function () {
        return this.pk;
    }
    
    Rubrique.prototype.getNom = function (){
        return this.nom;
    }

}