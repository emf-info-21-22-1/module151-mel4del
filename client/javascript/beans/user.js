
let User = function () {




    User.prototype.setPk = function (pk) {
        this.pk = pk;
    }

    User.prototype.setNom = function (nom) {
        this.nom = nom;
    }

    User.prototype.setMdp = function (mdp) {
        this.mdp = mdp;
    }

    User.prototype.setIsAdmin = function (isAdmin) {
        this.isAdmin = isAdmin;
    }


    User.prototype.getPk = function () {
        return this.pk;
    }

    User.prototype.getNom = function () {
        return this.nom;
    }
    User.prototype.getMdp = function () {
        return this.mdp;

    }
    User.prototype.getIsAdmin = function () {
        return this.isAdmin;
    }
};