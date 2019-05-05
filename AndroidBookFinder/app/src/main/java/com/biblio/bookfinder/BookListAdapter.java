package com.biblio.bookfinder;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.TextView;

import java.util.List;

///////////////////////////////////////////////////////////////////////////////////////
public class BookListAdapter extends BaseAdapter {

    private Context context;
    private int layout;
    private List<Book> arrayList;

    BookListAdapter(Context context, int layout, List<Book> arrayList) {
        this.context = context;
        this.layout = layout;
        this.arrayList = arrayList;
    }

    @Override
    public int getCount() {
        return arrayList.size();
    }

    @Override
    public Object getItem(int position) {
        return null;
    }

    @Override
    public long getItemId(int position) {
        return 0;
    }

    @Override
    public View getView(int position, View convertView, ViewGroup parent) {
        TextView textView;

        if (convertView == null) {
            LayoutInflater layoutInflater = (LayoutInflater) context.getSystemService(Context.LAYOUT_INFLATER_SERVICE);
            assert layoutInflater != null;
            convertView = layoutInflater.inflate(layout, null);
        }

        textView = convertView.findViewById(R.id.book_titre);
        final Book string = arrayList.get(position);
        textView.setText(string.getTitre());

        return convertView;
    }
}
