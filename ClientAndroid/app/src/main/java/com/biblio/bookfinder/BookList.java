package com.biblio.bookfinder;

import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.ListView;
import android.widget.TextView;

import androidx.appcompat.app.AppCompatActivity;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.List;


public class BookList extends AppCompatActivity {
    String json_string;
    JSONObject jsonObject;
    JSONArray jsonArray;
    List<Book> bookList;
    private ListView listView;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_book_list);

        TextView toolbar_title = findViewById(R.id.toolbar_title);
        toolbar_title.setText("Books");

        listView = findViewById(R.id.list_item);
        bookList = new ArrayList<>();

        json_string = getIntent().getExtras().getString("json_data");
        Log.i("json", json_string);

        try {
            jsonArray = new JSONArray(json_string);

            int count = 0;
            while (count < jsonArray.length()){
                JSONObject jsonObject = jsonArray.getJSONObject(count);
                //adding the product to product list
                bookList.add(new Book(
                        jsonObject.getString("titre"),
                        jsonObject.getString("description")
                ));
                count++;
            }
            Log.i("list", bookList.toString());

            BookListAdapter listAdapter = new BookListAdapter(this, R.layout.item, bookList);
            listView.setAdapter(listAdapter);
        } catch (JSONException e) {
            e.printStackTrace();
        }

    }
    public void clk_home(View view){
        finish();
        startActivity(new Intent(this, HomeActivity.class));
    }

}

