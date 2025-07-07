USE [um_db]
GO

/****** Object:  Table [dbo].[master_video]    Script Date: 7/7/2025 10:57:02 AM ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE TABLE [dbo].[master_video](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[divisi] [varchar](50) NULL,
	[bulan] [varchar](50) NULL,
	[tahun] [varchar](50) NULL,
	[kategory] [varchar](50) NULL,
	[target] [float] NULL,
	[angka_bulan] [int] NULL,
 CONSTRAINT [PK_master_video] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO


