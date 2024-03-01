


let Commentaire = function () {

    Commentaire.prototype.setTexte = function (texte) {
        this.texte = texte;
    };

    Commentaire.prototype.setPost = function (fkPost) {
        this.fkPost = fkPost;
    };
    Commentaire.prototype.setUser = function (fkUser) {
        this.fkUser = fkUser;
    };

    Commentaire.prototype.setPk = function (pk) {
        this.pk = pk;
    };
    Commentaire.prototype.getTexte = function () {
        return this.texte;

    };
    Commentaire.prototype.getFkPost = function () {
        return this.fkPost;
    };
    Commentaire.prototype.getFkUser = function () {
        return this.fkUser;
    }
    Commentaire.prototype.getPK = function () {
        return this.pk;
    }



}