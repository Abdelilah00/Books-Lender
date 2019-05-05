package com.biblio.bookfinder;

import android.Manifest;
import android.annotation.SuppressLint;
import android.app.AlertDialog;
import android.content.Context;
import android.content.Intent;
import android.content.pm.PackageManager;
import android.os.AsyncTask;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.TextView;

import androidx.appcompat.app.AppCompatActivity;
import androidx.core.app.ActivityCompat;
import androidx.core.content.ContextCompat;

import com.google.zxing.Result;

import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.io.OutputStream;
import java.io.OutputStreamWriter;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.URL;
import java.net.URLEncoder;

import me.dm7.barcodescanner.zxing.ZXingScannerView;

public class HomeActivity extends AppCompatActivity implements ZXingScannerView.ResultHandler {
    private ZXingScannerView zXingScannerView;
    private final int CAMERA_PERMISSION_CODE = 1;
    private String iduser ;
    private TextView toolbar_title;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_home);

        TextView toolbar_title = findViewById(R.id.toolbar_title);
        ImageView btn_home = findViewById(R.id.btn_home);
        toolbar_title.setText("Home");
        btn_home.setVisibility(View.INVISIBLE);


        iduser = ((MyApplication) this.getApplication()).getIdUser();
        if (iduser.equals("2")){
            View button = findViewById(R.id.button);
            button.setVisibility(View.GONE);
        }
    }

    public void showBooks_clk(View view) {
        DataBase db = new DataBase(this);
        db.execute("SelectBooks", null, null);
    }

    public void scanner_clk(View view) {
        //test pour garantier les permission de notre app
        if (ContextCompat.checkSelfPermission(HomeActivity.this, Manifest.permission.CAMERA) != PackageManager.PERMISSION_GRANTED) {
            ActivityCompat.requestPermissions(this, new String[]{Manifest.permission.CAMERA}, CAMERA_PERMISSION_CODE);
        }

        zXingScannerView = new ZXingScannerView(this);
        setContentView(zXingScannerView);
        zXingScannerView.setResultHandler(this);
        zXingScannerView.startCamera();
    }

    //method declancher qaund le resultat est prét
    @Override
    public void handleResult(Result result) {
        Log.d("Scanner", "Scanner => " + result);
        zXingScannerView.stopCamera();
        finish();
        DataBas dataBas = new DataBas(this);
        dataBas.execute("update", result.toString(), iduser);
        startActivity(new Intent(this, HomeActivity.class));

    }

    //BackButon Pressed
    @Override
    public void onBackPressed() {
        super.onBackPressed();
        if (zXingScannerView != null) {
            zXingScannerView.stopCamera();
            finish();
            startActivity(new Intent(this, HomeActivity.class));
        } else finish();
    }

}

class DataBas extends AsyncTask<String, Void, String> {
    private Context context;


    DataBas(Context cntx) {
        context = cntx;
    }

    @Override
    protected String doInBackground(String ... params) {
        String update_url = "http://10.10.10.10:8080/BookFinder/Books/UpdateBook.php";

        if (params[0].equals("update")) {
            try {
                URL url = new URL(update_url);
                HttpURLConnection httpURLConnection = (HttpURLConnection) url.openConnection();
                httpURLConnection.setRequestMethod("POST");
                httpURLConnection.setDoOutput(true);
                httpURLConnection.setDoInput(true);
                OutputStream outputStream = httpURLConnection.getOutputStream();
                BufferedWriter bufferedWriter = new BufferedWriter(new OutputStreamWriter(outputStream, "UTF-8"));
                String post_data = URLEncoder.encode("code", "UTF-8") + "=" + URLEncoder.encode(params[1], "UTF-8")+
                "&" + URLEncoder.encode("iduser", "UTF-8") + "=" + URLEncoder.encode(params[2], "UTF-8");
                bufferedWriter.write(post_data);
                bufferedWriter.flush();
                bufferedWriter.close();
                outputStream.close();

                InputStream inputStream = httpURLConnection.getInputStream();
                BufferedReader bufferedReader = new BufferedReader(new InputStreamReader(inputStream, "iso-8859-1"));
                String result = "";
                String line;
                while ((line = bufferedReader.readLine()) != null) {
                    result += line;
                }
                bufferedReader.close();
                inputStream.close();
                httpURLConnection.disconnect();

                return result;

            } catch (MalformedURLException e) {
                e.printStackTrace();

            } catch (IOException e) {
                e.printStackTrace();
            }


        }
        return null;

    }

    @Override
    protected void onPreExecute() {

    }

    @Override
    protected void onPostExecute(String result) {
        Log.i("result", "msg => " + result);
    }


    @Override
    protected void onProgressUpdate(Void... values) {
        super.onProgressUpdate(values);
    }
}
