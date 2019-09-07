package com.biblio.bookfinder;

import android.app.Application;

public class MyApplication extends Application {
    public String getIdUser() {
        return idUser;
    }

    public void setIdUser(String idUser) {
        this.idUser = idUser;
    }

    private String idUser;
}
