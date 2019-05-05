package com.biblio.bookfinder;


import android.os.Bundle;
import android.view.View;
import android.widget.AutoCompleteTextView;

import androidx.appcompat.app.AppCompatActivity;

public class LoginActivity extends AppCompatActivity {
    AutoCompleteTextView tb_username;
    AutoCompleteTextView tb_password;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);

        tb_username = findViewById(R.id.tb_username);
        tb_password = findViewById(R.id.tb_password);
    }
    public void btn_login_click(View view) {
        String username = tb_username.getText().toString();
        String password = tb_password.getText().toString();
        DataBase db = new DataBase(this);
        db.execute("login", username, password);
    }
}
