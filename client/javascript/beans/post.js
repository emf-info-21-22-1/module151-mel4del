

let Post = function () {

    Post.prototype.setPk = function (pk) {
        this.pk = pk;
    };
    Post.prototype.setfkRubrique = function (fkRubrique) {
        this.fkRubrique = fkRubrique;
    };
    Post.prototype.setfkUser = function (fkUser) {
        this.fkUser = fkUser;
    };
    Post.prototype.setTitre = function (titre) {
        this.titre = titre;

    };
    Post.prototype.setImage = function (image) {
        this.image = image;
    };
    Post.prototype.setTexte = function (texte) {
        this.texte = texte;
    };
    Post.prototype.getPk = function () {
        return this.pk;
    }

    Post.prototype.getRubrique = function () {
        return this.fkRubrique;
    };
    Post.prototype.getUser = function () {
        return this.fkUser;
    };
    Post.prototype.getTitre = function () {
        return this.titre;
    }
    Post.prototype.getImage = function () {
        return this.image;

    }
    Post.prototype.getTexte = function () {
        return this.texte;
    }

}