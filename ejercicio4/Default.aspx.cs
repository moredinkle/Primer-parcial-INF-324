using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Data;
using System.Data.SqlClient;

public partial class _Default : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        Label4.Text = "";
    }
    protected void Button1_Click(object sender, EventArgs e)
    {
        SqlConnection con = new SqlConnection();
        SqlDataAdapter ada = new SqlDataAdapter();
        DataSet ds = new DataSet();
        con.ConnectionString = "Data Source=LAPTOP-Q81M2BTO\\SQLEXPRESS;Initial Catalog=mibasedanielfernandez;User ID=user324;Password=1234";
        ada.SelectCommand = new SqlCommand();
        ada.SelectCommand.Connection = con;
        ada.SelectCommand.CommandText = "select * from usuario where username='"+TextBox1.Text+"';";
        ada.Fill(ds);
        DataTable dt = ds.Tables[0];
        int ci = dt.Rows[0].Field<int>(0);
        string field = dt.Rows[0].Field<string>(2);
        if (field.Equals(TextBox2.Text))
        {
            Response.Redirect("Default2.aspx?user=" + TextBox1.Text + "&ci=" + ci);
        }
        else {
            Label4.Text = "Contraseña o usuario incorrectos";
        }
    }
}

