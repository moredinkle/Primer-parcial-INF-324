using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Data;
using System.Data.SqlClient;

public partial class Default2 : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        if (!IsPostBack)
        {
            SqlConnection con = new SqlConnection();
            SqlDataAdapter ada = new SqlDataAdapter();
            DataSet ds = new DataSet();
            con.ConnectionString = "Data Source=LAPTOP-Q81M2BTO\\SQLEXPRESS;Initial Catalog=mibasedanielfernandez;User ID=user324;Password=1234";
            ada.SelectCommand = new SqlCommand();
            ada.SelectCommand.Connection = con;
            ada.SelectCommand.CommandText = "select * from persona where ci="+Request.QueryString["ci"];
            ada.Fill(ds);
            DataTable dt = ds.Tables[0];
            GridView1.DataSource = ds.Tables[0];
            GridView1.DataBind();
            String rol = dt.Rows[0].Field<string>(4);

            Label1.Text = dt.Rows[0].Field<string>(1);
            Label2.Text = char.ToUpper(rol[0]) + rol.Substring(1);


            SqlDataAdapter ada2 = new SqlDataAdapter();
            DataSet ds2 = new DataSet();
            con.ConnectionString = "Data Source=LAPTOP-Q81M2BTO\\SQLEXPRESS;Initial Catalog=mibasedanielfernandez;User ID=user324;Password=1234";
            ada2.SelectCommand = new SqlCommand();
            ada2.SelectCommand.Connection = con;
            ada2.SelectCommand.CommandText = "SELECT distinct	case when departamento='lp' then (SELECT avg(nota.notafinal) as Promedio FROM nota, persona pe WHERE nota.ci = pe.ci and departamento='lp' GROUP BY pe.departamento) else  0 end as La_Paz, case when departamento='sc' then (SELECT avg(nota.notafinal) as Promedio FROM nota, persona pe WHERE nota.ci = pe.ci and departamento='sc' GROUP BY pe.departamento) else  0 end as Santa_Cruz, case when departamento='cb' then (SELECT avg(nota.notafinal) as Promedio FROM nota, persona pe WHERE nota.ci = pe.ci and departamento='cb' GROUP BY pe.departamento) else  0 end as Cochabamba from persona";
            ada2.Fill(ds2);
            int [] num = new int[3]; int co=0;
            foreach (DataTable table in ds2.Tables)
            {
                foreach (DataRow row in table.Rows)
                {
                    foreach (int prom in row.ItemArray)
                    {
                        if (prom > 0) { num[co] = prom; co++; } 
                    }
                }
            }
            DataTable res = new DataTable();
            res.Columns.Add("La Paz");
            res.Columns.Add("Santa Cruz");
            res.Columns.Add("Cochabamba");
            res.Rows.Add(num[2], num[1], num[0]);
            GridView1.DataSource = res;
            GridView1.DataBind();
        }
    }


    protected void GridView1_SelectedIndexChanged(object sender, EventArgs e)
    {



    }

}



