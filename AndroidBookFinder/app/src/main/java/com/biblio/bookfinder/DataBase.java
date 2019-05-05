package com.biblio.bookfinder;

import android.app.AlertDialog;
import android.content.Context;
import android.content.Intent;
import android.os.AsyncTask;
import android.util.Log;

import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.Console;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.io.OutputStream;
import java.io.OutputStreamWriter;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.URL;
import java.net.URLEncoder;

public class DataBase extends AsyncTask<String, Void, String> {
    Context context;
    AlertDialog alertDialog;
    String JSON_STRING;

    DataBase(Context cntx) {
        context = cntx;
    }

    @Override
    protected String doInBackground(String... params) {
        String login_url = "http://10.10.10.10:8080/BookFinder/Users/login.php";
        String selectBooks_url = "http://10.10.10.10:8080/BookFinder/Books/SelectBooks.php";

        if (params[0].equals("login")) {
            try {
                URL url = new URL(login_url);
                HttpURLConnection httpURLConnection = (HttpURLConnection) url.openConnection();
                httpURLConnection.setRequestMethod("POST");
                httpURLConnection.setDoOutput(true);
                httpURLConnection.setDoInput(true);
                OutputStream outputStream = httpURLConnection.getOutputStream();
                BufferedWriter bufferedWriter = new BufferedWriter(new OutputStreamWriter(outputStream, "UTF-8"));
                String post_data = URLEncoder.encode("user_name", "UTF-8") + "=" + URLEncoder.encode(params[1], "UTF-8") +
                        "&" + URLEncoder.encode("password", "UTF-8") + "=" + URLEncoder.encode(params[2], "UTF-8");
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


        } else if (params[0].equals("SelectBooks")) {
            try {
                URL url = new URL(selectBooks_url);
                HttpURLConnection httpURLConnection = (HttpURLConnection) url.openConnection();
                InputStream inputStream = httpURLConnection.getInputStream();
                BufferedReader bufferedReader = new BufferedReader(new InputStreamReader(inputStream));
                StringBuilder stringBuilder = new StringBuilder();
                while ((JSON_STRING = bufferedReader.readLine()) != null) {
                    stringBuilder.append(JSON_STRING+"\n");
                }

                bufferedReader.close();
                inputStream.close();
                httpURLConnection.disconnect();
                return stringBuilder.toString().trim();
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
        alertDialog = new AlertDialog.Builder(context).create();
        alertDialog.setTitle("From Server");
    }

    @Override
    protected void onPostExecute(String result) {

        if (result.equals("0")) {
            alertDialog.setMessage("le compte n'exist pas");
            alertDialog.show();

        } else if (result.equals("parms Not found")) {
            alertDialog.setMessage("remplaire tous les champs");
            alertDialog.show();

        } else if (result.matches("\\d+(?:\\.\\d+)?")){
            Intent intent = new Intent();
            intent.setClass(context, HomeActivity.class);
            ((MyApplication) context.getApplicationContext()).setIdUser(result);
            context.startActivity(intent);

        }else {
            Intent intent = new Intent();
            intent.setClass(context, BookList.class);
            intent.putExtra("json_data", result);
            context.startActivity(intent);
        }
    }


    @Override
    protected void onProgressUpdate(Void... values) {
        super.onProgressUpdate(values);
    }
}
